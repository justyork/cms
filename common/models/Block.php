<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "blocks".
 *
 * @property integer $id
 * @property string $title
 * @property string $value
 * @property integer $is_lang
 *
 * @property string Get
 */
class Block extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'lang' => [
                'class' => 'common\behaviors\CMSLanguage',
                'fields' => ['value']
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['is_lang'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'is_lang' => Yii::t('app', 'Is Lang'),
        ];
    }

}
