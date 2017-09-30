<?php

/* @var $this yii\web\View */
use common\models\CMS;

/* @var $models common\models\Model[] */
/* @var $news common\models\News[] */
/* @var $works common\models\Work[] */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <ul>
                <?foreach ($models as $model):?>
                    <li><?=$model->name?></li>
                <?endforeach;?>
            </ul>
        </div>
        <div class="row">
            <?foreach ($models as $model):?>
                <div>
                    <?foreach ($model->_cars as $car):?>
                        <div class="col-sm-3">
                            <?=\yii\helpers\Html::img($car->thumb)?>
                            <?=\yii\helpers\Html::a($car->name, $car->link)?>
                        </div>
                    <? endforeach;?>
                </div>
            <?endforeach;?>
        </div>



        <div class="row">
            <h2>News</h2>

            <?=\yii\helpers\Html::a(Yii::t('app', 'All news'), \yii\helpers\Url::to(['news/index']))?>
            <?foreach ($news as $item):?>
                <div class="col-sm-4">
                    <h3>
                        <?=\yii\helpers\Html::a($item->title, $item->link)?>
                    </h3>

                    <?=\yii\helpers\StringHelper::truncateWords($item->text, 20)?>
                </div>
            <?endforeach;?>

        </div>

        <div class="row">

            <h2>About us</h2>

            <?=CMS::Block('About us text')?>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <?=CMS::Block('BMW tuning')?>
            </div>
            <div class="col-sm-3">
                <?=CMS::Block('Relax zone')?>
            </div>
            <div class="col-sm-3">
                <?=CMS::Block('Quality assurance')?>
            </div>
        </div>
        <div class="row">

            <h2>Recent Works</h2>


            <?=\yii\helpers\Html::a(Yii::t('app', 'All works'), \yii\helpers\Url::to(['works/index']))?>
            <?if($works):?>
                <?foreach ($works as $work):?>
                    <div class="col-sm-4">
                        <?=\yii\helpers\Html::a($work->title, $work->link)?>
                    </div>
                <?endforeach;?>
            <?endif;?>
        </div>
    </div>
</div>
