<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 15:33
 */

namespace common\behaviors;

use common\models\Language;
use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;

class CMSLanguage extends Behavior{

    public $fields;

    public $_local_attributes = [];

    private $translate_model;

    public function events()
    {
        return [
            ActiveRecord::EVENT_INIT => 'onInit',
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_BEFORE_DELETE => 'beforeDelete',
        ];
    }


    /**
     * Get attribute
     *
     * @param $name
     * @return bool|mixed
     */
    public function localAttributes($name){
        if(!isset($this->_local_attributes[$name]))
            return false;

        return $this->_local_attributes[$name];
    }

    /**
     * Инициализация
     */
    public function onInit(){
        $this->LoadOptions();
        $this->translate_model = 'common\models\translate\\'.$this->owner->formName().'Translate';
    }


    /**
     * After find model
     */
    public function afterFind()
    {
        $this->LoadTranslates();
    }


    /**
     * Сохранить мультиязычные переменные в базу
     *
     */
    public function afterSave(){

        $data = Yii::$app->request->post($this->owner->formName());

        if($data){
            foreach (Language::map() as $lng){
                foreach ($this->fields as $field){
                    $this->_local_attributes[$field.'_'.$lng] = $data[$field.'_'.$lng];
                }
            }
        }

        $class = $this->translate_model;

        foreach (Language::map() as $lng){
            $model = $class::find()
                ->where(
                    ['parent_id' => $this->owner->id,
                        'language' => $lng])
                ->one();

            if(!$model){
                $model = new $class;
                $model->parent_id = $this->owner->id;
                $model->language = $lng;
            }

            foreach ($this->fields as $field){

                $model->$field = $this->_local_attributes[$field.'_'.$lng];
            }
            $model->save();
        }
    }


    /**
     * Удалить переводы
     */
    public function beforeDelete(){

        $model = $this->translate_model;
        $model::deleteAll('parent_id = :id', ['id' => $this->owner->id]);
    }



    /**
     * Получить связанные поля с переводами
     *
     * @return \yii\db\ActiveQuery
     */
    public function get_translate(){
        $model = $this->translate_model;
        return $this->owner->hasMany($model, ['parent_id' => 'id']);
    }

    /**
     * Загрузить изначальные настройки мультиязычности
     */
    private function LoadOptions(){
        foreach ($this->fields as $field){
            $this->_local_attributes[$field] = '';

            foreach (Language::map() as $lng){
                $this->_local_attributes[$field.'_'.$lng] = '';
            }
        }
    }

    /**
     * Загрузить переводы полей
     */
    private function LoadTranslates(){
        $translates = $this->owner->_translate;

        foreach ($translates as $translate){
            foreach ($this->fields as $field){
                if(\Yii::$app->language == $translate->language)
                    $this->_local_attributes[$field] = $translate->$field == null ? '' : $translate->$field;

                $this->_local_attributes[$field.'_'.$translate->language] = $translate->$field == null ? '' : $translate->$field;
            }
        }
    }

    public function LangField($field, $lng, $attr){
        $fld = $field.'_'.$lng->code;
        $text_input_class = 'form-control';
        $ret = '';

        $ret .= Html::activeLabel($this->owner, $fld, ['class' => 'control-label']);
        switch ($attr['type']){
            case "textarea":
                $ret .= Html::activeTextarea($this->owner, $fld, ['class' => $text_input_class]);
                break;
            case "textInput":
                $ret .= Html::activeTextInput($this->owner, $fld, ['class' => $text_input_class]);
                break;

        }

        return $ret;
    }
}