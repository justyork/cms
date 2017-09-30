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

    // Генерация admin меню
    public static function AdminMenuCallback(){
        return function($menu){
            $controller = \Yii::$app->controller;

            $item = [
                'label' => $menu['name'],
                'url' => ($menu['children'] ? '#' : [$menu['route']]),
                'options' => ['class' => 'nav-item '.($menu['children'] ? 'nav-dropdown' : 'nav-item')],
                'items' => $menu['children'],
            ];

            if($menu['children']){
                $item['template'] = '<a href="{url}" class="nav-link nav-dropdown-toggle">{label}</a>';

                $url = '/'.$controller->id.'/'.$controller->action->id;
//                $url = '/'.$controller->id;
                if($controller->module->id != 'app-backend')
                    $url = '/'.$controller->module->id.$url;

                $is_open = false;
                foreach ($menu['children'] as $child){
//                    if(strpos($child['url'][0],$url) != -1){
//                        $is_open = true;
//                        break;
//                    }
                }

                if($is_open)
                    $item['options']['class'] .= ' open';

            }

            return $item;
        };
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