<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 19:32
 */

namespace frontend\controllers;


use common\models\Cart;
use yii\web\Controller;

class CartController extends Controller{

    public function actionIndex(){

    }

    public function actionAdd($item){
        \Yii::$app->cart->Add($item);
    }

    public function actionRemove($item){

        \Yii::$app->cart->Remove($item);
    }

}