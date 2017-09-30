<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "cars".
 *
 * @property integer $id
 * @property string $name
 * @property string $sub_name
 * @property string $image
 * @property string $link
 * @property integer $model_id
 * @property yii\web\UploadedFile $imageFile
 * @property Service[] $_services
 */
class Car extends ActiveRecord{

    public $imageFile;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'common\behaviors\CMSImage',
                'directory' => Yii::getAlias('@cars'),
                'field' => 'image',
                'file' => 'imageFile',
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id'], 'integer'],
            [['name', 'sub_name', 'image'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Name'),
            'sub_name' => Yii::t('app', 'Sub Name'),
            'image' => Yii::t('app', 'Image'),
            'model_id' => Yii::t('app', 'Model'),
        ];
    }

    public function getLink(){
        return Url::to(['cars/get', 'car_name' => $this->name, 'id' => $this->id]);
    }


    public function map(){
        return yii\helpers\ArrayHelper::map(Car::find()->all(), 'id', 'name');
    }


    public function get_services(){
        return $this->hasMany(Service::className(), ['id' => 'service_id'])
            ->viaTable('car_service', ['car_id' => 'id']);
    }
}
