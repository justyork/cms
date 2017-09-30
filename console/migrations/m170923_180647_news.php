<?php

use yii\db\Migration;

class m170923_180647_news extends Migration
{
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'url' => $this->string('255')->unique(),
            'image' => $this->string('255'),
            'status' => $this->boolean(),
            'date' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('news');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_180647_news cannot be reverted.\n";

        return false;
    }
    */
}
