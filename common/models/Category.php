<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $icon
 * @property string $url
 * @property integer $status
 * @property integer $position
 * @property SubCategory[] $_sub_categories
 */
class Category extends ActiveRecord
{
    public $imageFile;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'common\behaviors\CMSImage',
                'directory' => Yii::getAlias('@categories'),
                'field' => 'icon',
                'file' => 'imageFile',
            ],
            'lang' => [
                'class' => 'common\behaviors\CMSLanguage',
                'fields' => ['name']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'position'], 'integer'],
            [['icon', 'url'], 'string', 'max' => 255],
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
            'icon' => Yii::t('app', 'Icon'),
            'url' => Yii::t('app', 'Url'),
            'status' => Yii::t('app', 'Status'),
            'position' => Yii::t('app', 'Position'),
        ];
    }


    public function map(){
        return ArrayHelper::map(Category::find()->all(), 'id', 'name');
    }

    public function get_sub_categories(){
        return $this->hasMany(SubCategory::className(), ['category_id' => 'id']);
    }

    public function getLink(){

        if(isset($_GET['car_name'])){
            $car_name = $_GET['car_name'];
        }
        return Url::to(['category/get', 'category_url' => $this->url, 'car_name' => $car_name, 'id' => $this->id]);
    }
}
