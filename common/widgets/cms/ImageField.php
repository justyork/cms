<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 17:18
 */

namespace common\widgets\cms;


use yii\widgets\InputWidget;

class ImageField extends InputWidget {


    public function run()
    {
        return $this->render('image_field', [
            'model' => $this->model,
            'attribute' => $this->attribute
        ]);
    }

}