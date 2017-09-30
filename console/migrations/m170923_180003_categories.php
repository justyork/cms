<?php

use yii\db\Migration;

class m170923_180003_categories extends Migration
{
    public function safeUp()
    {

        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'icon' => $this->string(255),
            'url' => $this->string(255)->unique(),
            'status' => $this->boolean(),
            'position' => $this->integer()
        ]);

        $this->insert('categories', [
            'icon' => '',
            'url' => 'best-services',
            'status' => true,
            'position' => 1,
        ]);

        $this->insert('categories', [
            'icon' => '',
            'url' => 'repair',
            'status' => true,
            'position' => 1,
        ]);
        $this->insert('categories', [
            'icon' => '',
            'url' => 'multimedia',
            'status' => true,
            'position' => 1,
        ]);
        $this->insert('categories', [
            'icon' => '',
            'url' => 'exterior',
            'status' => true,
            'position' => 1,
        ]);
        $this->insert('categories', [
            'icon' => '',
            'url' => 'interior',
            'status' => true,
            'position' => 1,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('categories');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_180003_categories cannot be reverted.\n";

        return false;
    }
    */
}
