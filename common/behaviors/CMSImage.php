<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 14:12
 */

namespace common\behaviors;


use common\models\CMS;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use InvalidArgumentException;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\imagine\Image;
use yii\web\UploadedFile;

/**
 *
 * @property string $path
 * @property string $thumb
 */
class CMSImage extends Behavior
{
    public $directory;
    public $field;
    public $parent = false;
    public $file;
    public $thumb_size = [80, 80];
    private $host;
    private $image_name;
    private $image_inst;
    private $_set_parent = false;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'onAfterFind',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'onBeforeSave',
            ActiveRecord::EVENT_BEFORE_INSERT => 'onBeforeSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'onAfterSave',
            ActiveRecord::EVENT_AFTER_INSERT => 'onAfterSave',
            ActiveRecord::EVENT_BEFORE_DELETE => 'onBeforeDelete',
        ];
    }


    public function __construct(array $config = []){

        $this->host = $_SERVER['DOCUMENT_ROOT'];

        parent::__construct($config);
    }

    public function onAfterFind(){



        if($this->parent && !$this->owner->isNewRecord && !$this->_set_parent){
            $this->directory .= '/'.$this->owner->{$this->parent};
            $this->_set_parent = true;
        }

        $this->directory .= '/'.$this->owner->id;

    }

    public function getThumb(){

        if(!is_file($this->host.$this->directory.'/'.$this->owner->{$this->field}))
            return false;

        $file_name = $this->directory.'/thumb/'.$this->owner->{$this->field};
        if(!is_dir($this->host.$this->directory.'/thumb')) mkdir($this->host.$this->directory.'/thumb', 0777, true);
        if(!is_file($this->host.$file_name))
            $this->Resize($this->thumb_size, 'thumb');

        return $file_name;
    }

    public function getPath(){

        if(!is_file($this->host.$this->directory.'/'.$this->owner->{$this->field}))
            return false;

        return $this->directory.'/'.$this->owner->{$this->field};
    }


    private function Resize($size, $size_name){
        $image = Image::getImagine()->open($this->host.$this->directory.'/'.$this->owner->{$this->field});
        $image->thumbnail(new Box($size[0], $size[1]), 'outbound')
            ->save($this->host.$this->directory.'/'.$size_name.'/'.$this->owner->{$this->field});
    }

    public function onBeforeSave($event){

        $image = UploadedFile::getInstance($this->owner, $this->file);

        if($image){
            $this->image_inst = $image;
            $this->image_name = CMS::GenerateImageName() . '.' . $image->extension;
            $this->owner->{$this->field} = $this->image_name;
        }

    }

    public function onAfterSave($event){


        if($this->image_inst){

            if($this->parent && !$this->_set_parent){
                $this->directory .= '/'.$this->owner->{$this->parent};
                $this->_set_parent = true;
            }

            if($event->name == ActiveRecord::EVENT_AFTER_INSERT)
                $this->directory .= '/'.$this->owner->id;

            if(!is_dir($this->host.$this->directory)) mkdir($this->host.$this->directory, 0777, true);

            $this->image_inst->saveAs($this->host.$this->directory . '/' . $this->image_name);

        }
    }

    public function onBeforeDelete(){
        $this->deleteDir($_SERVER['DOCUMENT_ROOT'].$this->directory);
    }

    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
}