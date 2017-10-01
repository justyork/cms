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
            'parent_id' => $this->integer(),
            'level' => $this->integer(),
            'status' => $this->boolean(),
            'position' => $this->integer()
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
