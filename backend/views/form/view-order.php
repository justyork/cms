<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 03.10.2017
 * Time: 19:38
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FormOrder */

$this->title = Yii::t('app', 'Form view'). ' '. $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form callback'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
            </div>
            <div class="card-block">

                <p>
                <h5><?=Yii::t('app', 'Set status')?></h5>

                <?php $form = ActiveForm::begin(); ?>
                <?=$form->field($model, 'status')->dropDownList($model->status_list)?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        'phone',
                        'email',
                        'message',
                        'f_data:html:Data',
                        'f_status:raw:Status'
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>