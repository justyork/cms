<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 25.09.2017
 * Time: 19:33
 */

namespace common\models;


use yii\helpers\Html;

class ActiveRecord extends \yii\db\ActiveRecord
{

    public function __get($name)
    {

        if(isset($this->_local_attributes) && isset($this->_local_attributes[$name])){
            return $this->_local_attributes[$name];
        }
        else
            return parent::__get($name);
    }

    public function __set($name, $value)
    {
        if (isset($this->_local_attributes) && isset($this->_local_attributes[$name])) {
            $this->_local_attributes[$name] = $value;
        } else {
            parent::__set($name, $value);
        }
    }
}