<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 17:24
 */
use yii\helpers\Html;

?>

<div class="row">
    <div class="col-sm-3"><?= $form->field($model, $field)->fileInput() ?></div>
    <div class="col-sm-3">

        <?if($model->thumb):?>
            <?=Html::img($model->thumb)?>
        <?endif;?>
    </div>
</div>
