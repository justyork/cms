<?php

use yii\db\Migration;

class m170923_183803_form_callback extends Migration
{

    public function safeUp()
    {
        $this->createTable('form_callback', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'phone' => $this->string(255),
            'date' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('form_callback');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_183803_form_callback cannot be reverted.\n";

        return false;
    }
    */
}
