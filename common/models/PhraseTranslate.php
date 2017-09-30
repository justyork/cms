<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phrase_translate".
 *
 * @property integer $id
 * @property integer $phrase_id
 * @property integer $language_id
 * @property string $value
 *
 * @property Language $language
 * @property Phrase $phrase
 */
class PhraseTranslate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phrase_translate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phrase_id', 'language_id', 'value'], 'required'],
            [['phrase_id', 'language_id'], 'integer'],
            [['value'], 'string'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['phrase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Phrase::className(), 'targetAttribute' => ['phrase_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phrase_id' => Yii::t('app', 'Phrase ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhrase()
    {
        return $this->hasOne(Phrase::className(), ['id' => 'phrase_id']);
    }
}
