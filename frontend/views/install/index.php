<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 01.10.2017
 * Time: 17:56
 */
use backend\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Block */
/* @var $form yii\widgets\ActiveForm */



AppAsset::register($this);
?>


<?php $form = ActiveForm::begin(); ?>

    <?=Html::hiddenInput('run', '')?>
    <?=Html::submitButton()?>
<? ActiveForm::end()?>
