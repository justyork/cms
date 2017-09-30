<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "works".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $image
 * @property string $link
 * @property integer $rating
 * @property integer $status
 */
class Work extends ActiveRecord
{

    public $lang_fields = ['title'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rating', 'status'], 'integer'],
            [['url', 'image'], 'string', 'max' => 255],
            [['url'], 'unique'],
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
            'rating' => Yii::t('app', 'Rating'),
            'status' => Yii::t('app', 'Status'),
        ];
    }


    public function getLink(){
        return Url::to(['works/get', 'url' => $this->url]);
    }
}
