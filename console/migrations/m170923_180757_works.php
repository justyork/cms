<?php

use yii\db\Migration;

class m170923_180757_works extends Migration
{

    public function safeUp()
    {
        $this->createTable('works', [
            'id' => $this->primaryKey(),
            'url' => $this->string('255')->unique(),
            'image' => $this->string('255'),
            'rating' => $this->integer(),
            'status' => $this->boolean(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('works');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_180757_works cannot be reverted.\n";

        return false;
    }
    */
}
