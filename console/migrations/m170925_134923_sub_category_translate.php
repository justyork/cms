<?php

use yii\db\Migration;

class m170925_134923_sub_category_translate extends Migration
{

    public function safeUp()
    {
        $this->createTable('sub_category_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(255),
        ]);
        $this->addForeignKey(
            'idx-sub_category_translate-parent_id',
            'sub_category_translate',
            'parent_id',
            'sub_category',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('sub_category_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_134923_sub_category_translate cannot be reverted.\n";

        return false;
    }
    */
}
