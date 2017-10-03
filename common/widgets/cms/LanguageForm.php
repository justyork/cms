<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 17:17
 */

namespace common\widgets\cms;


use common\models\Language;
use yii\base\Widget;

class LanguageForm extends Widget{

    public $model;
    public $form;
    public $columns;

    public function run(){

        $langs = Language::find()->all();
        return $this->render('language_form', [
            'langs' => $langs,
            'model' => $this->model,
            'columns' => $this->columns
        ]);
    }




}