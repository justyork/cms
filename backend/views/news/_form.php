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

    <?= $form->field($model, 'imageFile')->widget(\common\widgets\cms\ImageField::className()) ?>

    <?= $form->field($model, 'status')->checkbox() ?>


    <?=$form->field($model, 'lang')->widget(\common\widgets\cms\LanguageField::className(),[
        'items' => [
            'title' => ['type' => 'textInput'],
            'text' => ['type' => 'editor']
        ]
    ])->label(false)?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
