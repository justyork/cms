<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 24.09.2017
 * Time: 16:41
 */

namespace common\models;


use Yii;
use yii\helpers\Html;

class CMS
{

    public static function Block($block_name, $clear = false){
        /* @var $model Block */

        $model = Block::find()->where(['title' => $block_name])->one();

        if(!$model){
            return Html::tag('div', Yii::t('app', 'Block "{block}" not found', ['block' => '<b>'.$block_name.'</b>']), ['style' => 'color: red; border: 1px solid red; padding: 5px 10px; display: inline-block;    background: #fce9e9; margin: 10px;']);
        }

        if($clear)
            return strip_tags($model->value);
        return $model->value;
    }

    public static function FrontendMenu()
    {
        return [
            ['label' => 'Service', 'url' => ['site/index']],
            ['label' => 'Recent works', 'url' => ['works/index']],
            ['label' => 'About', 'url' => ['page/get', 'url' => 'about-us']],
        ];
    }

}