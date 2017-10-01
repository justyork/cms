<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    <p class="text-muted">Sign In to your account</p>
    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email'])->label(false)?>
    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
    <?= $form->field($model, 'rememberMe')->checkbox() ?>
    <div class="row">
        <div class="col-6">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary px-4', 'name' => 'login-button']) ?>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-link px-0">Forgot password?</button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
