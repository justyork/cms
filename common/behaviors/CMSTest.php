<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 15:59
 */

namespace common\behaviors;


use common\models\Language;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class CMSTest extends Behavior{

    public $fields;
    public $_local_attributes = [];

    public function events()
    {
        return [
            ActiveRecord::EVENT_INIT => 'onInit',
        ];
    }

    public function onInit(){

        $this->LoadOptions();

    }


    private function LoadOptions(){
        foreach ($this->fields as $field){
            $this->_local_attributes[$field] = '';

            foreach (Language::map() as $lng){
                $this->_local_attributes[$field.'_'.$lng] = '';
            }
        }
    }
}