<?php

use yii\db\Migration;

class m170925_134939_seo_translate extends Migration
{

    public function safeUp()
    {
        $this->createTable('seo_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(255),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'h1' => $this->text(),
            'top_text' => $this->text(),
            'bottom_text' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-seo_translate-parent_id',
            'seo_translate',
            'parent_id',
            'seo',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('seo_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_134939_seo_translate cannot be reverted.\n";

        return false;
    }
    */
}
