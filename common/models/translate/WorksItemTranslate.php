<?php

namespace common\models\translate;

use common\models\WorksItem;
use Yii;

/**
 * This is the model class for table "works_item_translate".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $language
 * @property string $text
 *
 * @property WorksItem $parent
 */
class WorksItemTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works_item_translate';
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
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorksItem::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'text' => Yii::t('app', 'Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(WorksItem::className(), ['id' => 'parent_id']);
    }
}
