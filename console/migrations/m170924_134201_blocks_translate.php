<?php

use yii\db\Migration;

class m170924_134201_blocks_translate extends Migration
{
    public function safeUp()
    {
        $this->createTable('blocks_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'value' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-blocks_content-parent_id',
            'blocks_translate',
            'parent_id',
            'blocks',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('blocks_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_134201_blocks_content cannot be reverted.\n";

        return false;
    }
    */
}
