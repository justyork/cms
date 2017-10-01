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
        $user = User::findOne(1);
        if(!$user){
            $user = new User();
            $this->id = 1;
            $user->username = 'admin';
            $user->name = 'Admin';
            $user->email = 'admin@cms.ru';
            $user->setPassword('demo');
            $user->generateAuthKey();
            $user->save();
        }

        // Moderator
        $user = User::findOne(2);
        if(!$user){
            $user = new User();
            $this->id = 2;
            $user->username = 'moderator';
            $user->name = 'Moderator';
            $user->email = 'moderator@cms.ru';
            $user->setPassword('demo');
            $user->generateAuthKey();
            $user->save();
        }

        // User
        $user = User::findOne(3);
        if(!$user){
            $user = new User();
            $this->id = 3;
            $user->username = 'user';
            $user->name = 'User';
            $user->email = 'user@cms.ru';
            $user->setPassword('demo');
            $user->generateAuthKey();
            $user->save();
        }



        $this->auth = Yii::$app->authManager;

        // Permissions
        $p1 = $this->makePerm('ADMIN_PANEL', 'Enter to admin panel');
        $p2 = $this->makePerm('PROFILE', 'Enter to profile');
        $p3 = $this->makePerm('PAGE', 'PAGE');
        $p4 = $this->makePerm('CREATE_PAGE', 'CREATE_PAGE');
        $p5 = $this->makePerm('UPDATE_PAGE', 'UPDATE_PAGE');
        $p6 = $this->makePerm('DELETE_PAGE', 'DELETE_PAGE');
        $p7 = $this->makePerm('NEWS', 'NEWS');
        $p8 = $this->makePerm('CREATE_NEWS', 'CREATE_NEWS');
        $p9 = $this->makePerm('UPDATE_NEWS', 'UPDATE_NEWS');
        $p10 = $this->makePerm('DELETE_NEWS', 'DELETE_NEWS');
        $p11 = $this->makePerm('LANGUAGE_CRUD', 'LANGUAGE_CRUD');
        $p12 = $this->makePerm('USER_CRUD', 'USER_CRUD');
        $p13 = $this->makePerm('SEO_CRUD', 'SEO_CRUD');
        $p14 = $this->makePerm('CATEGORY_CRUD', 'CATEGORY_CRUD');
        $p15 = $this->makePerm('BLOCK_CRUD', 'BLOCK_CRUD');
        $p16 = $this->makePerm('FORM_CALLBACK', 'FORM_CALLBACK');
        $p17 = $this->makePerm('FORM_ORDER', 'FORM_ORDER');
        $p18 = $this->makePerm('ROLE_CRUD', 'ROLE_CRUD');
        $p19 = $this->makePerm('PRODUCT', 'PRODUCT');
        $p20 = $this->makePerm('PRODUCT_CREATE', 'PRODUCT_CREATE');
        $p21 = $this->makePerm('PRODUCT_UPDATE', 'PRODUCT_UPDATE');
        $p22 = $this->makePerm('PRODUCT_DELETE', 'PRODUCT_DELETE');
//        $p2 = $this->makePerm('', '');
//        $p2 = $this->makePerm('', '');
//        $p2 = $this->makePerm('', '');
//        $p2 = $this->makePerm('', '');


        /* Set permition */


        // user
        $user = $this->auth->createRole('user');
        $this->auth->add($user);
        $this->auth->addChild($user, $p2);

        // moder
        $moder = $this->auth->createRole('moderator');
        $this->auth->add($moder);
        $this->auth->addChild($moder, $user);
        $this->auth->addChild($moder, $p1);
        $this->auth->addChild($moder, $p3);
        $this->auth->addChild($moder, $p4);
        $this->auth->addChild($moder, $p5);
        $this->auth->addChild($moder, $p7);
        $this->auth->addChild($moder, $p8);
        $this->auth->addChild($moder, $p9);
        $this->auth->addChild($moder, $p16);
        $this->auth->addChild($moder, $p17);
        $this->auth->addChild($moder, $p19);
        $this->auth->addChild($moder, $p20);
        $this->auth->addChild($moder, $p21);

        // admin
        $admin = $this->auth->createRole('admin');
        $this->auth->add($admin);
        $this->auth->addChild($admin, $moder);
        $this->auth->addChild($admin, $p6);
        $this->auth->addChild($admin, $p10);
        $this->auth->addChild($admin, $p11);
        $this->auth->addChild($admin, $p12);
        $this->auth->addChild($admin, $p13);
        $this->auth->addChild($admin, $p14);
        $this->auth->addChild($admin, $p15);
        $this->auth->addChild($admin, $p18);
        $this->auth->addChild($admin, $p22);

        $this->auth->assign($admin, 1);
        $this->auth->assign($moder, 2);
        $this->auth->assign($user, 3);

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