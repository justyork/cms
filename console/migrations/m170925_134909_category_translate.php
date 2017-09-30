<?php

use yii\db\Migration;

class m170925_134909_category_translate extends Migration
{

    public function safeUp()
    {
        $this->createTable('category_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(255),
        ]);
        $this->addForeignKey(
            'idx-category_translate-parent_id',
            'category_translate',
            'parent_id',
            'categories',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('category_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_134909_category_translate cannot be reverted.\n";

        return false;
    }
    */
}
