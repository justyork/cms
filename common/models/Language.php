<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $country
 * @property integer $status
 *
 */
class Language extends ActiveRecord
{


    private static $_lang_list;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'country'], 'required'],
            [['status'], 'integer'],
            [['name', 'country'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 5],
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
            'code' => Yii::t('app', 'Code'),
            'country' => Yii::t('app', 'Country'),
            'status' => Yii::t('app', 'Status'),
        ];
    }




    public static function map(){
        if(self::$_lang_list == null){
            $model = self::find()->all();
            self::$_lang_list = ArrayHelper::map($model, 'code', 'code');
        }

        return self::$_lang_list;

    }


}
