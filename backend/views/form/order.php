<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 03.10.2017
 * Time: 18:51
 */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

?>


<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
            </div>
            <div class="card-block">

                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'id',
                        'name',
                        'phone',
                        'f_status:raw:Status',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',
                            'buttons' => [
                                'view' => function($i, $data){
                                    return Html::a('<i class="glyphicon glyphicon-eye-open"></i>', ['view-callback', 'id' => $data->id]);
                                }
                            ]
                        ],
                    ],
                ]); ?>
                <?php Pjax::end(); ?>

            </div>
        </div>
    </div>
</div>

