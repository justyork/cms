<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Form Orders');
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
                            <?= Html::a(Yii::t('app', 'Create Form Order'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    <?php Pjax::begin(); ?>                                            <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                'id',
            'name',
            'email:email',
            'phone',
            'message:ntext',
            // 'date',
            // 'status',
            // 'items:ntext',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                                        <?php Pjax::end(); ?>            </div>
        </div>
    </div>
</div>
