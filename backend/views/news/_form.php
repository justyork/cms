<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?=\common\widgets\cms\ImageField::widget(compact('form', 'model'))?>


    <?= $form->field($model, 'status')->checkbox() ?>

    <?=\common\widgets\cms\LanguageForm::widget([
        "model" => $model,
        'columns' => [
            'title' => ['type' => 'textInput'],
            'text' => ['type' => 'textarea']
        ]
    ])?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>