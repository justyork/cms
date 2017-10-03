<?php

use yii\db\Migration;

class m160204_045439_justyork_multi_language_init extends Migration {

	public function up() {
		$tableOptions_mysql = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		$tables             = $this->getDb()->schema->tableNames;
		if (in_array('{{%language}}', $tables)) {
			$this->dropTable('{{%language}}');
		}
		$this->createTable('{{%language}}', [
			'id'      => 'INT(11) NOT NULL AUTO_INCREMENT',
			0         => 'PRIMARY KEY (`id`)',
			'name'    => 'VARCHAR(255) NOT NULL',
			'code'    => 'VARCHAR(5) NOT NULL',
			'country' => 'VARCHAR(255) NOT NULL',
			'status'  => 'INT(1) NOT NULL DEFAULT 1',
		], $tableOptions_mysql);
	}

	public function down() {
		$this->dropTable('{{%language}}');
	}
}
