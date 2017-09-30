<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 20:38
 */


/* @var $model \common\models\News*/


?>

<div class="row">

    <h1><?=$model->title?></h1>

    <?=\yii\helpers\Html::img($model->thumb)?>
    <p><?=$model->text?></p>
</div>

<?=\yii\helpers\Html::a(Yii::t('app', 'All news'), \yii\helpers\Url::to(['news/index']))?>