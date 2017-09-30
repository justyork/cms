<?php

use yii\db\Migration;

class m170923_175928_models extends Migration
{
    public function safeUp()
    {

        $this->createTable('models', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'icon' => $this->string(255),
        ]);
        $this->insert('models', [
            'name' => 'BMW',
            'icon' => 'bmw.jpg'
        ]);
        $this->insert('models', [
            'name' => 'Mercedes-Benz',
            'icon' => 'merc.jpg'
        ]);
        $this->insert('models', [
            'name' => 'Jaguar',
            'icon' => 'jaguar.jpg'
        ]);
        $this->insert('models', [
            'name' => 'Land Rover',
            'icon' => 'landrover.jpg'
        ]);
        $this->insert('models', [
            'name' => 'Ford',
            'icon' => 'ford.jpg'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('models');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_175928_models cannot be reverted.\n";

        return false;
    }
    */
}
