<?php

use yii\db\Migration;

class m170925_134832_news_translate extends Migration
{

    public function safeUp()
    {
        $this->createTable('news_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(255),
            'text' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-news_translate-parent_id',
            'news_translate',
            'parent_id',
            'news',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('news_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_134832_news_translate cannot be reverted.\n";

        return false;
    }
    */
}
