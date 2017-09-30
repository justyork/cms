<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 20:38
 */

/* @var $model \common\models\News[]*/


?>


<div class="row">
    <?foreach ($model as $item):?>
        <div class="col-sm-4">
            <h2><?=\yii\helpers\Html::a($item->title, $item->link)?></h2>

            <?=\yii\helpers\Html::img($item->thumb)?>

            <br>
            <?=\yii\helpers\StringHelper::truncateWords($item->text, 20)?>
        </div>
    <?endforeach;?>
</div>
