<?php
use navatech\language\helpers\LanguageHelper;
use yii\db\Migration;

class m160213_041916_navatech_multi_language_insert extends Migration {

	public function up() {
		$this->insert('{{%language}}', [
			'id'      => 1,
			'name'    => 'English',
			'code'    => 'en',
			'country' => 'us',
			'status'  => 1,
		]);
        $this->insert('{{%language}}', [
            'id'      => 2,
            'name'    => 'Русский',
            'code'    => 'ru',
            'country' => 'ru',
            'status'  => 1,
        ]);
        $this->insert('{{%language}}', [
            'id'      => 3,
            'name'    => 'Greek',
            'code'    => 'el',
            'country' => 'gr',
            'status'  => 1,
        ]);
		$this->insert('{{%phrase}}', [
			'id'   => 1,
			'name' => 'language',
		]);
		$this->insert('{{%phrase}}', [
			'id'   => 2,
			'name' => 'phrase',
		]);
		$this->insert('{{%phrase}}', [
			'id'   => 3,
			'name' => 'name',
		]);
		$this->insert('{{%phrase}}', [
			'id'   => 4,
			'name' => 'code',
		]);
		$this->insert('{{%phrase}}', [
			'id'   => 5,
			'name' => 'country',
		]);
		$this->insert('{{%phrase}}', [
			'id'   => 6,
			'name' => 'status',
		]);
		$this->insert('{{%phrase}}', [
			'id'   => 7,
			'name' => 'translate',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 1,
			'language_id' => 1,
			'value'       => 'Language',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 1,
			'language_id' => 2,
			'value'       => 'Язык',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 2,
			'language_id' => 1,
			'value'       => 'Phrase',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 2,
			'language_id' => 2,
			'value'       => 'Фраза',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 3,
			'language_id' => 1,
			'value'       => 'Name',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 3,
			'language_id' => 2,
			'value'       => 'Имя',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 4,
			'language_id' => 1,
			'value'       => 'Code',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 4,
			'language_id' => 2,
			'value'       => 'Код',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 5,
			'language_id' => 1,
			'value'       => 'Country',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 5,
			'language_id' => 2,
			'value'       => 'Страна',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 6,
			'language_id' => 1,
			'value'       => 'Status',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 6,
			'language_id' => 2,
			'value'       => 'Статус',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 7,
			'language_id' => 1,
			'value'       => 'Translate',
		]);
		$this->insert('{{%phrase_translate}}', [
			'phrase_id'   => 7,
			'language_id' => 2,
			'value'       => 'Перевод',
		]);
		LanguageHelper::setLanguages();
		LanguageHelper::setAllData();
	}

	public function down() {
		echo "m160213_041916_navatech_multi_language_insert cannot be reverted.\n";
		return false;
	}
}
