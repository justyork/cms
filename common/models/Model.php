<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "models".
 *
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property Car[] $_cars
 */
class Model extends ActiveRecord
{


    public $imageFile;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'common\behaviors\CMSImage',
                'directory' => Yii::getAlias('@models'),
                'field' => 'icon',
                'file' => 'imageFile',
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'string', 'max' => 255],
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
            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    public function get_cars(){
        return $this->hasMany(Car::className(), ['model_id' => 'id']);
    }


    public function map(){
        return ArrayHelper::map(Model::find()->all(), 'id', 'name');
    }
}
