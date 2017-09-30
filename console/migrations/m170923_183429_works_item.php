<?php

use yii\db\Migration;

class m170923_183429_works_item extends Migration
{
    public function safeUp()
    {
        $this->createTable('works_item', [
            'id' => $this->primaryKey(),
            'work_id' => $this->integer(),
            'image' => $this->string(255),
            'main_text' => $this->integer(),
            'status' => $this->boolean()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('works_item');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_183429_works_item cannot be reverted.\n";

        return false;
    }
    */
}
