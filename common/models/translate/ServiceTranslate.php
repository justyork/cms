<?php

namespace common\models\translate;

use common\models\Service;
use Yii;

/**
 * This is the model class for table "service_translate".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $language
 * @property string $name
 * @property string $text
 *
 * @property Services $parent
 */
class ServiceTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['text'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'language' => Yii::t('app', 'Language'),
            'name' => Yii::t('app', 'Name'),
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Services::className(), ['id' => 'parent_id']);
    }
}
