<?php

namespace common\models\translate;

use common\models\Seo;
use Yii;

/**
 * This is the model class for table "seo_translate".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $language
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $h1
 * @property string $top_text
 * @property string $bottom_text
 *
 * @property Seo $parent
 */
class SeoTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['keywords', 'description', 'h1', 'top_text', 'bottom_text'], 'string'],
            [['language'], 'string', 'max' => 6],
            [['title'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seo::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
            'title' => Yii::t('app', 'Title'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'h1' => Yii::t('app', 'H1'),
            'top_text' => Yii::t('app', 'Top Text'),
            'bottom_text' => Yii::t('app', 'Bottom Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Seo::className(), ['id' => 'parent_id']);
    }
}
