<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Seo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-inverse card-info text-center">
        <div class="card-block">
            <blockquote class="card-blockquote">
                <p>Используйте модель и ID модели, либо url для поиска нужной страницы</p>
            </blockquote>
        </div>
    </div>

    <?= $form->field($model, 'model_name')->dropDownList(Yii::$app->seo->model_list, ['prompt' => 'Select model']) ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'url')->textInput() ?>


    <?= $form->field($model, 'imageFile')->widget(\common\widgets\cms\ImageField::className()) ?>

    <?=$form->field($model, 'lang')->widget(\common\widgets\cms\LanguageField::className(),[
        'items' => [
            'title' => ['type' => 'textInput'],
            'description' => ['type' => 'textarea'],
            'keywords' => ['type' => 'textarea'],
            'h1' => ['type' => 'textInput'],
            'top_text' => ['type' => 'editor'],
            'bottom_text' => ['type' => 'editor'],
        ]
    ])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
