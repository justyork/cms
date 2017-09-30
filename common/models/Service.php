<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $text
 * @property string $active_cars
 * @property string $subcategory_name
 * @property integer $price
 * @property integer $status
 * @property integer $subcategory_id
 * @property Car[] $_cars
 * @property SubCategory $_sub_category
 */
class Service extends ActiveRecord
{

    public $car_list;
    public $imageFile;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'common\behaviors\CMSImage',
                'directory' => Yii::getAlias('@services'),
                'field' => 'image',
                'file' => 'imageFile',
            ],
            'lang' => [
                'class' => 'common\behaviors\CMSLanguage',
                'fields' => ['name', 'text']
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'status', 'subcategory_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['car_list'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'price' => Yii::t('app', 'Price'),
            'status' => Yii::t('app', 'Status'),
            'subcategory_id' => Yii::t('app', 'Subcategory ID'),
            'car_list' => Yii::t('app', 'Car list'),

        ];
    }

    public function afterFind()
    {

        $this->car_list = ArrayHelper::map($this->_cars, 'id', 'id');

        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        CarService::deleteAll('service_id = :service', [':service' => $this->id]);
        foreach ($this->car_list as $item) {
            $car = Car::findOne($item);
            $this->link('_cars', $car);
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function get_cars()
    {
        return $this->hasMany(Car::className(), ['id' => 'car_id'])
            ->viaTable('car_service', ['service_id' => 'id']);
    }

    public function get_sub_category()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'subcategory_id']);
    }

    public function getSubcategory_name()
    {
        return $this->_sub_category->name;
    }


    public function getActive_cars()
    {

        $cars = ArrayHelper::map($this->_cars, 'id', 'name');

        return implode(', ', $cars);
    }


}