<?php

use yii\db\Migration;

class m170925_135617_works_item_translate extends Migration
{

    public function safeUp()
    {
        $this->createTable('works_item_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'text' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-works_item_translate-parent_id',
            'works_item_translate',
            'parent_id',
            'works_item',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('works_item_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_135617_works_item_translate cannot be reverted.\n";

        return false;
    }
    */
}
