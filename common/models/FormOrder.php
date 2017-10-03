<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property integer $date
 * @property integer $status
 * @property mixed $f_status
 * @property void $f_data
 * @property string $items
 */
class FormOrder extends ActiveRecord
{
    public $status_list;
    public function init(){
        $this->status_list = [
            0 => Yii::t('app', 'Created'),
            1 => Yii::t('app', 'Applied'),
            2 => Yii::t('app', 'Processed')
        ];

        parent::init();
    }

    public function afterFind(){
        $this->items = json_decode($this->items);
        parent::afterFind();
    }
    public function beforeSave($insert){
        $this->items = json_encode($this->items);
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'items'], 'string'],
            [['date', 'status'], 'integer'],
            [['name', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'message' => Yii::t('app', 'Message'),
            'date' => Yii::t('app', 'Date'),
            'status' => Yii::t('app', 'Status'),
            'items' => Yii::t('app', 'Items'),
        ];
    }


    public function getF_status(){
        return $this->status_list[$this->status];
    }

    public function getF_data(){

    }
}
