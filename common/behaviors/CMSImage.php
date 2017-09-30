<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 14:12
 */

namespace common\behaviors;


use Imagine\Gd\Imagine;
use Imagine\Image\Box;
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
    public $file;
    public $thumb_size = [80, 80];
    private $host;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'UploadImage',
            ActiveRecord::EVENT_BEFORE_INSERT => 'UploadImage',
        ];
    }


    public function __construct(array $config = []){

        $this->host = $_SERVER['DOCUMENT_ROOT'];

        parent::__construct($config);
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

    public function UploadImage($event){
        $image = UploadedFile::getInstance($this->owner, $this->file);
        if($image){

            if(!is_dir($this->host.$this->directory)) mkdir($this->host.$this->directory, 0777, true);

            $name = $image->baseName . '.' . $image->extension;
            $image->saveAs($this->host.$this->directory . '/' . $name);

            $this->owner->{$this->field} = $name;
        }
    }
}