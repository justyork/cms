<?php

use yii\db\Migration;

class m170923_181201_lang_data extends Migration
{
    public function safeUp()
    {

        $this->createTable('lang_data', [
            'id' => $this->primaryKey(),
            'model_name' => $this->string(255),
            'field' => $this->string(255),
            'lng_id' => $this->integer(),
            'item_id' => $this->integer(),
            'value' => $this->text()
        ]);


        $this->insert('lang_data', [
            'model_name' => 'Block',
            'field' => 'text',
            'lng_id' => 1,
            'item_id' => 3,
            'value' => 'Car tuning is modification of the performance or appearance of a vehicle. For actual "tuning" in the sense of automobiles or vehicles, see engine tuning. Most vehicles leave the factory set up for an average driver\'s expectations and conditions. Tuning, on the other hand, has become a way to personalize the characteristics of a vehicle to the owner\'s preference. Cars may be altered to provide better fuel economy, produce more power, or to provide better handling and driving.
<br />
<br />
Car tuning is related to auto racing, although most performance cars never compete. Tuned cars are built for the pleasure of owning and driving. Exterior modifications include changing the aerodynamic characteristics of the vehicle via side skirts, front and rear bumpers, spoilers, splitters, air vents and light weight wheels.

<br />
<br />
Cars have always been subject to after company modification. The golden age of car tuning was the decades between World War II and the beginning of air pollution restrictions. Both moderate and radical modification have been commemorated in the popular songs Hot Rod Race and Hot Rod Lincoln. The names of Abarth and Cooper appear on models styled after the cars they modified. Cosworth went, with support from Ford, from modifying Ford of BritainEnglish Flathead engines for Lotus Sevens to dominating Formula One racing.

<br />
<br />
In the 1970s and 1980s, many Japanese performance cars were never exported outside the Japanese domestic market. In the late 1980s and early 1990s, Grey import vehichles of Japanese performance cars, such as the Nissan Skyline, began to be privately imported into Western Europe and North America. In the United States, this was in direct contrast to the domestic car production around the same time, where there was a very small performance aftermarket for domestic compact and economy cars; the focus was instead on sporty cars such as the Ford Mustang and Chevrolet Corvette, or on classic muscle cars.
<br />
<br />
Because of their light weight and the increasing availability of low-prise tuning equipment, economy and compact cars exhibit high performance at a low cost in comparison to dedicated sports cars. As professional sporting and racing with such vehicles increased, so did recreational use of these vehicles. Drivers with little or no automotive, mechanical, or racing experience would modify their vehicles to emulate the more impressive versions of racing vehicles, with mixed results.'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Page',
            'field' => 'title',
            'lng_id' => 1,
            'item_id' => 1,
            'value' => 'About us'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Page',
            'field' => 'title',
            'lng_id' => 2,
            'item_id' => 1,
            'value' => 'О нас'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Page',
            'field' => 'text',
            'lng_id' => 1,
            'item_id' => 1,
            'value' => 'Text about us'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Page',
            'field' => 'text',
            'lng_id' => 2,
            'item_id' => 1,
            'value' => 'Текст о нас'
        ]);

        /* *** Категории ***/
        $this->insert('lang_data', [
            'model_name' => 'Category',
            'field' => 'name',
            'lng_id' => 1,
            'item_id' => 1,
            'value' => 'Best services'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Category',
            'field' => 'name',
            'lng_id' => 2,
            'item_id' => 1,
            'value' => 'Лучшие сервисы'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Category',
            'field' => 'name',
            'lng_id' => 1,
            'item_id' => 2,
            'value' => 'Service and repair'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Category',
            'field' => 'name',
            'lng_id' => 1,
            'item_id' => 3,
            'value' => 'Multimedia and retrofitting'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Category',
            'field' => 'name',
            'lng_id' => 1,
            'item_id' => 4,
            'value' => 'Exterior'
        ]);
        $this->insert('lang_data', [
            'model_name' => 'Category',
            'field' => 'name',
            'lng_id' => 1,
            'item_id' => 5,
            'value' => 'Interior'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('lang_data');

    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_181201_lang_data cannot be reverted.\n";

        return false;
    }
    */
}
