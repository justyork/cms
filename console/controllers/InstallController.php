<?php

/**
 * Created by PhpStorm.
 * User: York
 * Date: 01.10.2017
 * Time: 22:26
 */

namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;

class InstallController extends Controller
{

    /**
     * @var $auth yii\rbac\DbManager
     */
    private $auth;

    public function actionIndex(){
        $this->stdout("Welcome to JustYork CMS installation\n\n");
        $this->rbac();
    }


    public function rbac(){


        $this->stdout("Create default users permissions and roles \n\n");

        /* Create users */
        // Admin
        $user = new User();
        $user->no_save = true;
        $user->id = 1;
        $user->status = 1;
        $user->username = 'admin';
        $user->name = 'Admin';
        $user->email = 'admin@cms.ru';
        $user->setPassword('demo');
        $user->generateAuthKey();
        if(!$user->save()){
            var_dump($user->getErrors());
            die();
        }


        // Moderator
        $user = new User();
        $user->no_save = true;
        $user->id = 2;
        $user->status = 1;
        $user->username = 'moderator';
        $user->name = 'Moderator';
        $user->email = 'moderator@cms.ru';
        $user->setPassword('demo');
        $user->generateAuthKey();
        $user->save();

        // User
//        $user = User::findOne(3);
        $user = new User();
        $user->no_save = true;
        $user->id = 3;
        $user->status = 1;
        $user->username = 'user';
        $user->name = 'User';
        $user->email = 'user@cms.ru';
        $user->setPassword('demo');
        $user->generateAuthKey();
        $user->save();


        $permissions = [
            'ADMIN_PANEL' => 'Enter to admin panel',
            'PROFILE' => 'Enter to profile',
            'PAGE' => 'Show pages',
            'PAGE_CREATE' => 'Create page',
            'PAGE_UPDATE' => 'Update page',
            'PAGE_DELETE' => 'Delete page',
            'NEWS' => 'Show news',
            'NEWS_CREATE' => 'Create news',
            'NEWS_UPDATE' => 'Update news',
            'NEWS_DELETE' => 'Delete news',
            'LANGUAGE_CRUD' => 'Languages',
            'USER_CRUD' => 'Show Users',
            'SEO_CRUD' => 'Show Seo',
            'CATEGORY_CRUD' => 'Show Category',
            'BLOCK_CRUD' => 'Show Text blocks',
            'FORM_CALLBACK' => 'Form callback data',
            'FORM_ORDER' => 'Form order data',
            'ROLE_CRUD' => 'Show Roles',
            'PRODUCT' => 'Show products',
            'PRODUCT_CREATE' => 'Create product',
            'PRODUCT_UPDATE' => 'Update product',
            'PRODUCT_DELETE' => 'Delete product',
        ];

        $roles = [
            'admin' => 'all',
            'moderator' => ['ADMIN_PANEL', 'PAGE_CREATE', 'PAGE_UPDATE', 'PAGE', 'NEWS', 'NEWS_CREATE', 'NEWS_UPDATE', 'FORM_CALLBACK', 'FORM_ORDER', 'PRODUCT', 'PRODUCT_CREATE', 'PRODUCT_UPDATE', 'PROFILE', ],
            'user' => ['PROFILE'],
        ];


        $this->auth = Yii::$app->authManager;

        $perm_data = [];
        foreach ($permissions as $name => $val){
            $perm_data[$name] = $this->makePerm($name, $val);
        }

        $roles_data = [];
        foreach ($roles as $role_name => $perms){
            $role = $this->auth->createRole($role_name);
            $roles_data[$role_name] = $role;
            $this->auth->add($role);
            if($perms == 'all'){
                foreach ($perm_data as $key => $val){
                    $this->auth->addChild($role, $val);
                }
            }
            else{
                foreach ($perms as $val){
                    $this->auth->addChild($role, $perm_data[$val]);
                }
            }
        }

        /* Set permition */

        $this->auth->assign($roles_data['admin'], 1);
        $this->auth->assign($roles_data['moderator'], 2);
        $this->auth->assign($roles_data['user'], 3);

        $this->stdout("Created users:\n-admin:demo \n-moderator:demo \n-user:demo \n\n");
        return true;
    }


    private function makePerm($name, $desc){

        $item = $this->auth->createPermission($name);
        $item->description = $desc;
        $this->auth->add($item);
        return $item;

    }
}