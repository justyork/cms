<?php

use yii\db\Migration;

class m170924_122927_menu_router extends Migration
{

    private $models = [
        'model',
        'car',
        'category',
        'sub-category',
        'service',
        'page',
        'news',
        'work',
        'block',
        'lang',
        'form-order',
        'form-callback',
        'seo',
    ];

    private $actions = [
        'create', 'update', 'delete', 'view', 'index'
    ];

    public function safeUp()
    {
        /* РОУТЫ */
        foreach ($this->models as $item){
            $link = '/'.$item.'/*';
            $this->insert('auth_item', [
                'name' => $link,
                'type' => 2,
                'created_at' => time(),
                'updated_at' => time()
            ]);
            foreach ($this->actions as $act){
                $link = '/'.$item.'/'.$act;
                $this->insert('auth_item', [
                    'name' => $link,
                    'type' => 2,
                    'created_at' => time(),
                    'updated_at' => time()
                ]);

            }
        }


        /* МЕНЮ */

        $this->insert('menu', [
            'id' => 1,
            'name' => 'Auth',
            'parent' => null,
            'route' => null,
            'order' => 500
        ]);
        $this->insert('menu', [
            'id' => 2,
            'name' => 'Catalog',
            'parent' => null,
            'route' => null,
            'order' => 1
        ]);
        $this->insert('menu', [
            'name' => 'Users',
            'parent' => 1,
            'route' => '/admin/user/index',
            'order' => 2
        ]);
        $this->insert('menu', [
            'name' => 'Roles',
            'parent' => 1,
            'route' => '/admin/role/index',
            'order' => 3
        ]);
        $this->insert('menu', [
            'name' => 'Permissions',
            'parent' => 1,
            'route' => '/admin/permission/index',
            'order' => 4
        ]);
        $this->insert('menu', [
            'name' => 'Menus',
            'parent' => 1,
            'route' => '/admin/menu/index',
            'order' => 1
        ]);
        $this->insert('menu', [
            'name' => 'Rules',
            'parent' => 1,
            'route' => '/admin/rule/index',
            'order' => 5
        ]);
        $this->insert('menu', [
            'name' => 'Routes',
            'parent' => 1,
            'route' => '/admin/route/index',
            'order' => 6
        ]);
        $this->insert('menu', [
            'name' => 'Assignments',
            'parent' => 1,
            'route' => '/admin/assignment/index',
            'order' => 7
        ]);


        $this->insert('menu', [
            'name' => 'Models',
            'parent' => 2,
            'route' => '/model/index',
            'order' => 1
        ]);
        $this->insert('menu', [
            'name' => 'Cars',
            'parent' => 2,
            'route' => '/car/index',
            'order' => 2
        ]);
        $this->insert('menu', [
            'name' => 'Categories',
            'parent' => 2,
            'route' => '/category/index',
            'order' => 3
        ]);
        $this->insert('menu', [
            'name' => 'Sub categories',
            'parent' => 2,
            'route' => '/sub-category/index',
            'order' => 4
        ]);
        $this->insert('menu', [
            'name' => 'Services',
            'parent' => 2,
            'route' => '/service/index',
            'order' => 5
        ]);


        $this->insert('menu', [
            'name' => 'Pages',
            'parent' => null,
            'route' => '/page/index',
            'order' => 10
        ]);
        $this->insert('menu', [
            'name' => 'News',
            'parent' => null,
            'route' => '/news/index',
            'order' => 11
        ]);
        $this->insert('menu', [
            'name' => 'Blocks',
            'parent' => null,
            'route' => '/block/index',
            'order' => 12
        ]);
        $this->insert('menu', [
            'name' => 'Langs',
            'parent' => null,
            'route' => '/lang/index',
            'order' => 13
        ]);
        $this->insert('menu', [
            'name' => 'Forms',
            'parent' => null,
            'route' => '/forms/index',
            'order' => 14
        ]);
        $this->insert('menu', [
            'name' => 'Seo',
            'parent' => null,
            'route' => '/seo/index',
            'order' => 15
        ]);


    }

    public function safeDown()
    {

        $this->delete('auth_item', 'type = 2');
        $this->truncateTable('menu');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170924_122927_menu_router cannot be reverted.\n";

        return false;
    }
    */
}
