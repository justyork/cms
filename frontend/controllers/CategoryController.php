<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 19:32
 */

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\HttpException;

class CategoryController extends Controller{

    public function actionGet(){

        return $this->render('get');

    }

}