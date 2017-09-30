<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_callback".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property integer $date
 * @property integer $status
 */
class FormCallback extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_callback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'status'], 'integer'],
            [['name', 'phone'], 'string', 'max' => 255],
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
            'phone' => Yii::t('app', 'Phone'),
            'date' => Yii::t('app', 'Date'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
