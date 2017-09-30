<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phrase".
 *
 * @property integer $id
 * @property string $name
 *
 * @property PhraseTranslate[] $phraseTranslates
 */
class Phrase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phrase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhraseTranslates()
    {
        return $this->hasMany(PhraseTranslate::className(), ['phrase_id' => 'id']);
    }
}
