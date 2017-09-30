<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 19:32
 */

namespace frontend\controllers;


use common\models\Car;
use common\models\SubCategory;
use yii\web\Controller;
use yii\web\HttpException;

class CategoryController extends Controller{

    public function actionGet($car_name, $category_url = false, $sub_category_url = false){

        // Car
        $car_model = Car::find()->where(['name' => $car_name])->one();
        if(!$car_model) throw new HttpException(404, 'Car not found');


        // Sub category
        $sub_category_model = SubCategory::find()->where(['url' => $sub_category_url])->one();


        //Services
        if($sub_category_model)
            $services = $car_model->get_services()->where(['subcategory_id' => $sub_category_model->id])->all();

        return $this->render('get', compact('services'));

    }

}