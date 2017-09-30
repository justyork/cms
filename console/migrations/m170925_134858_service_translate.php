<?php

use yii\db\Migration;

class m170925_134858_service_translate extends Migration
{

    public function safeUp()
    {
        $this->createTable('service_translate', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(255),
            'text' => $this->text(),
        ]);
        $this->addForeignKey(
            'idx-service_translate-parent_id',
            'service_translate',
            'parent_id',
            'services',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('service_translate');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_134858_service_translate cannot be reverted.\n";

        return false;
    }
    */
}
