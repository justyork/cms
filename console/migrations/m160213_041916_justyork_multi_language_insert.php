<?php
use yii\db\Migration;

class m160213_041916_justyork_multi_language_insert extends Migration {

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
	}

	public function down() {
		echo "m160213_041916_navatech_multi_language_insert cannot be reverted.\n";
		return false;
	}
}
