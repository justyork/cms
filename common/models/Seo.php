<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $model_name
 * @property integer $item_id
 * @property string $image
 * @property string $url
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $h1
 * @property string $top_text
 * @property string $bottom_text
 * @property string $path
 * @property mixed $model
 */
class Seo extends ActiveRecord
{


    public $imageFile;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'common\behaviors\CMSImage',
                'directory' => Yii::getAlias('@seo'),
                'field' => 'image',
                'file' => 'imageFile',
            ],
            'lang' => [
                'class' => 'common\behaviors\CMSLanguage',
                'fields' => ['title', 'description', 'keywords', 'h1', 'top_text', 'bottom_text']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_name', 'item_id'], 'integer'],
            [['image', 'url'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'model_name' => Yii::t('app', 'Model Name'),
            'item_id' => Yii::t('app', 'Item ID'),
            'image' => Yii::t('app', 'Image'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    public function getModel()
    {
        return self::$models[$this->model_name];
    }

    public function getPath(){
        return Yii::getAlias('@seo').'/'.$this->image;
    }
}
