<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 19:32
 */

namespace frontend\controllers;


use common\models\News;
use yii\web\Controller;
use yii\web\HttpException;

class NewsController extends Controller{

    public function actionGet($url, $id = false){

//        var_dump($id);

        $model = News::find()->where(['url' => $url])->one();

        if(!$model)
            throw new HttpException(404, \Yii::t('app', 'News not found'));

        return $this->render('get', compact('model'));

    }

    public function actionIndex(){


        $model = News::find()->limit(10)->all();

        return $this->render('index', compact('model'));
    }

}