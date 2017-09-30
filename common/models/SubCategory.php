<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "sub_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $link
 * @property string $url
 * @property Category $_category
 * @property string $category_name
 */
class SubCategory extends ActiveRecord
{


    public function behaviors()
    {
        return [
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
        return 'sub_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['url'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category'),
            'url' => Yii::t('app', 'Url'),
        ];
    }


    public function get_category(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategory_name(){
        return $this->_category->name;
    }

    public function getLink(){
        return Url::to(['category/get', 'sub_category_url' => $this->url, 'category_url' => $_GET['category_url'], 'car_name' => $_GET['car_name'], 'id' => $this->id, 'seo' => 'Sub-Category']);
    }

    public function map(){
        return ArrayHelper::map(SubCategory::find()->all(), 'id', 'name');
    }

    public function selectList(){
        $model = Category::find()->all();
        $list = [];
        foreach ($model as $item)
            $list[$item->name] = ArrayHelper::map($item->_sub_categories, 'id', 'name');

        return $list;
    }
}
