<?php

use yii\db\Migration;

class m170923_180005_sub_category extends Migration
{
    public function safeUp()
    {

        $this->createTable('sub_category', [
            'id' => $this->primaryKey(),
            'url' => $this->string(255),
            'category_id' => $this->integer(),
        ]);

    }

    public function safeDown()
    {
        $this->dropTable('sub_category');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_182306_sub_category cannot be reverted.\n";

        return false;
    }
    */
}
