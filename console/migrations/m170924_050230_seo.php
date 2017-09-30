<?php

use yii\db\Migration;

class m170924_050230_seo extends Migration
{
    public function safeUp()
    {
        $this->createTable('seo', [
            'id' => $this->primaryKey(),
            'model_name' => $this->integer(),
            'item_id' => $this->integer(),
            'image' => $this->string(255),
            'url' => $this->string(255),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('seo');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_050230_seo cannot be reverted.\n";

        return false;
    }
    */
}
