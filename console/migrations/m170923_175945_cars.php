<?php

use yii\db\Migration;

class m170923_175945_cars extends Migration
{
    public function safeUp()
    {
        $this->createTable('cars', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'sub_name' => $this->string(255),
            'image' => $this->string(255),
            'model_id' => $this->integer(),
        ]);
        $this->insert('cars', [
            'name' => 'BMW X5',
            'sub_name' => 'F15',
            'image' => 'bmwx5.jpg',
            'model_id' => 1
        ]);
        $this->insert('cars', [
            'name' => 'BMW X6',
            'sub_name' => 'F16',
            'image' => 'bmwx6.jpg',
            'model_id' => 1
        ]);
        $this->insert('cars', [
            'name' => 'BMW X4',
            'sub_name' => 'F26',
            'image' => 'bmwx4.jpg',
            'model_id' => 1
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('cars');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_175945_cars cannot be reverted.\n";

        return false;
    }
    */
}
