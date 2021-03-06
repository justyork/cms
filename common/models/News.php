<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $url
 * @property string $link
 * @property string $title
 * @property string $text
 * @property string $image
 * @property integer $status
 * @property integer $date
 */
class News extends ActiveRecord
{
    public $imageFile;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'common\behaviors\CMSImage',
                'directory' => Yii::getAlias('@news'),
                'field' => 'image',
                'file' => 'imageFile',
            ],
            'lang' => [
                'class' => 'common\behaviors\CMSLanguage',
                'fields' => ['title', 'text']
            ]
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'boolean'],
            [['date'], 'integer'],
            [['url', 'image'], 'string', 'max' => 255],
            [['url'], 'unique'],
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
            'url' => Yii::t('app', 'Url'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    public function beforeSave($insert){

        if($insert){
            $this->date = time();
        }

        return parent::beforeSave($insert);
    }

    public function getLink(){
        return Url::to(['news/get', 'url' => $this->url, 'id' => $this->id]);
    }
}
