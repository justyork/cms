<?php

use yii\db\Migration;

class m170923_180020_services extends Migration
{
    public function safeUp()
    {

        $this->createTable('services', [
            'id' => $this->primaryKey(),
            'image' => $this->string(255),
            'price' => $this->integer(),
            'status' => $this->boolean(),
            'subcategory_id' => $this->integer()
        ]);


    }

    public function safeDown()
    {


        $this->dropTable('services');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_180020_services cannot be reverted.\n";

        return false;
    }
    */
}
