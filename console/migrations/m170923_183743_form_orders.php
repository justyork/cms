<?php

use yii\db\Migration;

class m170923_183743_form_orders extends Migration
{

    public function safeUp()
    {
        $this->createTable('form_orders', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'phone' => $this->string(255),
            'message' => $this->text(),
            'date' => $this->integer(),
            'status' => $this->integer(),
            'items' => $this->text()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('form_orders');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_183743_form_orders cannot be reverted.\n";

        return false;
    }
    */
}
