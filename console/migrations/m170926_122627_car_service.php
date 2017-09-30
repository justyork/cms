<?php

use yii\db\Migration;

class m170926_122627_car_service extends Migration
{
    public function safeUp()
    {
        $this->createTable('car_service', [
            'car_id' => $this->integer(),
            'service_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'xid-car_service-car_id',
            'car_service',
            'car_id',
            'cars',
            'id'
        );

        $this->addForeignKey(
            'xid-car_service-service_id',
            'car_service',
            'service_id',
            'services',
            'id'
        );
    }

    public function safeDown()
    {

        $this->dropTable('car_service');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170926_122627_car_service cannot be reverted.\n";

        return false;
    }
    */
}
