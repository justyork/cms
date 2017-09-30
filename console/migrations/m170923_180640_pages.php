<?php

use yii\db\Migration;

class m170923_180640_pages extends Migration
{
    public function safeUp()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'url' => $this->string('255')->unique(),
            'main_title' => $this->string('255'),
        ]);

        $this->insert('pages', [
            'url' => 'about-us',
            'main_title' => 'About us',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('pages');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_180640_pages cannot be reverted.\n";

        return false;
    }
    */
}
