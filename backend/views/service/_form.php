<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Service */
/* @var $models common\models\Model[] */
/* @var $form yii\widgets\ActiveForm */

$models = \common\models\Model::find()->all();
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'subcategory_id')->dropDownList(\common\models\SubCategory::selectList()) ?>

    <? foreach ($models as $m): ?>
        <div>
            <h6><?=$m->name?></h6>
            <?= Html::activeCheckboxList($model, 'car_list', \yii\helpers\ArrayHelper::map($m->_cars, 'id', 'name'), ['unselect' => null]) ?>
        </div>
    <?endforeach ?>


    <?=\common\widgets\cms\ImageField::widget([
        'model' => $model,
        'form' => $form
    ])?>


    <?=\common\widgets\cms\LanguageForm::widget([
        "model" => $model,
        'columns' => [
            'name' => ['type' => 'textInput'],
            'text' => ['type' => 'textarea'],
        ]
    ])?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
