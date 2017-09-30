<?php

use yii\db\Migration;

class m170925_134823_page_translate extends Migration
{
    public function safeUp()
    {
        $this->createTable('page_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(255),
            'text' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-page_translate-parent_id',
            'page_translate',
            'parent_id',
            'pages',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('page_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_134823_page_translate cannot be reverted.\n";

        return false;
    }
    */
}
