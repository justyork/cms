<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
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
                            <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    <?php Pjax::begin(); ?>                                            <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                'id',
                                'username',
                                'name',
                                'surname',
                                'phone',
                                'role',
                                 'status:boolean',
                                // 'auth_key',
                                // 'password_hash',
                                // 'password_reset_token',
                                // 'email:email',
                                // 'status',
                                 'created_at:date',
                                // 'updated_at',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>
                                        <?php Pjax::end(); ?>            </div>
        </div>
    </div>
</div>
