<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FormCallback */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Form Callback',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
            </div>
            <div class="card-block">

                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>
