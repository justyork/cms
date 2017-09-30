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

    <?= $form->field($model, 'model_name')->dropDownList(\common\models\Seo::$models, ['prompt' => 'Select model']) ?>

    <?= $form->field($model, 'item_id')->textInput() ?>

    <?= $form->field($model, 'url')->textInput() ?>


    <?=\common\widgets\cms\ImageField::widget(compact('form', 'model'))?>

    <?=\common\widgets\cms\LanguageForm::widget([
        "model" => $model,
        'columns' => [
            'title' => ['type' => 'textInput'],
            'description' => ['type' => 'textarea'],
            'keywords' => ['type' => 'textarea'],
            'h1' => ['type' => 'textInput'],
            'top_text' => ['type' => 'textarea'],
            'bottom_text' => ['type' => 'textarea'],
        ]
    ])?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
