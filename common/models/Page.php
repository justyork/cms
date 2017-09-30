<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $url
 * @property string $link
 * @property string $title
 * @property string $text
 */
class Page extends ActiveRecord
{

    public function behaviors()
    {
        return [
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
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'string', 'max' => 255],
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
            'main_title' => Yii::t('app', 'Main Title'),
        ];
    }

    public function getLink(){
        return Url::to(['page/get', 'url' => $this->url]);
    }
}
