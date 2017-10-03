<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 17:24
 */
use yii\helpers\Html;

/**
 * @var $field \yii\widgets\ActiveField
 * @var $attribute string
 * @var $model \common\models\ActiveRecord
 */
?>

<div class="row">
    <div class="col-sm-3">
        <?= Html::activeFileInput($model, $attribute) ?>
    </div>
    <div class="col-sm-3">
        <?if($model->thumb):?>
            <?=Html::img($model->thumb)?>
        <?endif;?>
    </div>
</div>
