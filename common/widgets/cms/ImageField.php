<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 17:18
 */

namespace common\widgets\cms;


use yii\base\Widget;

class ImageField extends Widget{

    public $model;
    public $form;
    public $field = 'imageFile';

    public function init(){
        parent::init();


    }

    public function run()
    {
        return $this->render('image_field', [
            'model' => $this->model,
            'form' => $this->form,
            'field' => $this->field
        ]);
    }

}