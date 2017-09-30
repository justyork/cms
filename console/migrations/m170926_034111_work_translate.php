<?php

use yii\db\Migration;

class m170926_034111_work_translate extends Migration
{
    public function safeUp()
    {
        $this->createTable('work_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-work_translate-parent_id',
            'work_translate',
            'parent_id',
            'works',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('work_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_034111_work_translate cannot be reverted.\n";

        return false;
    }
    */
}
