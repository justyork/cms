<?php

namespace backend\controllers;


class RoleController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['*']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['ROLE_CRUD'],
                    ],
                ]
            ]
        ];
    }

    public function actionIndex(){

        if(isset($_POST['Assign'])){
            $this->SaveAssign();
            return $this->refresh();
        }

        if(isset($_POST['Role'])){
            $this->SaveRole();
            return $this->refresh();
        }

        if(isset($_POST['Action'])){
            $this->SaveAction();
            return $this->refresh();
        }



        return $this->render('index');
    }


    private function SaveAssign(){
        $auth = \Yii::$app->authManager;
        foreach ($_POST['Assign'] as $role_name => $perm_list){
            $role = $auth->getRole($role_name);
            $auth->removeChildren($role);
            foreach ($perm_list as $perm_name => $s){
                $perm = $auth->getPermission($perm_name);
                $auth->addChild($role, $perm);
            }
        }
    }

    private function SaveRole(){
        $auth = \Yii::$app->authManager;

        $role = $auth->createRole($_POST['Role']['name']);
        $role->description = $_POST['Role']['description'];
        $auth->add($role);
    }

    private function SaveAction(){
        $auth = \Yii::$app->authManager;

        $perm = $auth->createPermission($_POST['Action']['name']);
        $perm->description = $_POST['Action']['description'];
        $auth->add($perm);

        $admin = $auth->getRole('admin');
        $auth->addChild($admin, $perm);

    }


}
