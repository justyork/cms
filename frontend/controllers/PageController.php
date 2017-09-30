<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 19:32
 */

namespace frontend\controllers;


use common\models\Page;
use yii\web\Controller;
use yii\web\HttpException;

class PageController extends Controller{


    public function actionGet($url){

        $model = Page::find()->where(['url' => $url])->one();

        if(!$model)
            throw new HttpException(404, \Yii::t('app', 'Page not found'));

        return $this->render('get', compact('model'));

    }

}