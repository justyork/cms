<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WorksItem */

$this->title = Yii::t('app', 'Create Works Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Works Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
