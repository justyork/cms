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
 * @property string $items
 */
class FormOrder extends ActiveRecord
{
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
}
