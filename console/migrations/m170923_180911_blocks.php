<?php

use yii\db\Migration;

class m170923_180911_blocks extends Migration
{

    public function safeUp()
    {
        $this->createTable('blocks', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'text' => $this->text(),
            'is_lang' => $this->boolean(),
        ]);

        $this->insert('blocks', [
            'is_lang' => false,
            'title' => 'Phone',
            'text' => '+357 25 555 555'
        ]);
        $this->insert('blocks', [
            'is_lang' => false,
            'title' => 'Address',
            'text' => '89 Vasileos Georgiou A’ Street, <br />
P. Germasogeia 4048 Limassol, Cyprus'
        ]);

        $this->insert('blocks', [
            'is_lang' => true,
            'title' => 'Footer text',
            'text' => 'Car tuning is modification of the performance or appearance of a vehicle. For actual "tuning" in the sense of automobiles or vehicles, see engine tuning. Most vehicles leave the factory set up for an average driver\'s expectations and conditions. Tuning, on the other hand, has become a way to personalize the characteristics of a vehicle to the owner\'s preference. Cars may be altered to provide better fuel economy, produce more power, or to provide better handling and driving.
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
    }

    public function safeDown()
    {
        $this->dropTable('blocks');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170923_180911_blocks cannot be reverted.\n";

        return false;
    }
    */
}
