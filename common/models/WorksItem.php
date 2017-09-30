<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "works_item".
 *
 * @property integer $id
 * @property integer $work_id
 * @property string $image
 * @property integer $main_text
 * @property integer $status
 */
class WorksItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'main_text', 'status'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_id' => Yii::t('app', 'Work ID'),
            'image' => Yii::t('app', 'Image'),
            'main_text' => Yii::t('app', 'Main Text'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
