<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 30.09.2017
 * Time: 14:48
 */

namespace common\widgets\cms;


use common\models\Language;
use yii\widgets\InputWidget;

class LanguageField extends InputWidget{

    public $items;

    public function run(){


        $langs = Language::find()->all();

        return $this->render('language_field', [
            'langs' => $langs,
            'items' => $this->items,
            'model' => $this->model,
            'form' => $this->field->form
        ]);


    }


}