<?php
namespace backend\models;
use Yii;
use yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: York
 * Date: 02.10.2017
 * Time: 1:57
 */
class Menu{

    public static function Get(){
        $item_class = 'nav-item';

        return [
            [
                'label' => self::icon('speedometer').'Home',
                'url' => ['site/index'],
                'options' => ['class' => $item_class],
                'encode' => false,
            ],
            [
                'label' =>  self::icon('people').'Users',
                'options' => ['class' => $item_class.' nav-dropdown'],
                'url' => '#',
                'visible' => Yii::$app->user->can('USER_CRUD') || Yii::$app->user->can('ROLE_CRUD'),
                'encode' => false,
                'template' => '<a href="{url}" class="nav-link nav-dropdown-toggle">{label}</a>',
                'items' => [
                    [
                        'label' =>  self::icon('directions').'Roles',
                        'url' => ['role/index'],
                        'visible' => Yii::$app->user->can('ROLE_CRUD'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                    [
                        'label' =>  self::icon('user').'Users',
                        'url' => ['user/index'],
                        'visible' => Yii::$app->user->can('USER_CRUD'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                ],
            ],
            [
                'label' =>  self::icon('screen-desktop').'Web Content',
                'options' => ['class' => $item_class.' nav-dropdown'],
                'url' => '#',
                'visible' => Yii::$app->user->can('PAGE')
                    || Yii::$app->user->can('NEWS')
                    || Yii::$app->user->can('BLOCK_CRUD'),
                'encode' => false,
                'template' => '<a href="{url}" class="nav-link nav-dropdown-toggle">{label}</a>',
                'items' => [
                    [
                        'label' =>  self::icon('doc').'Pages',
                        'url' => ['page/index'],
                        'visible' => Yii::$app->user->can('PAGE'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                    [
                        'label' =>  self::icon('speech').'News',
                        'url' => ['news/index'],
                        'visible' => Yii::$app->user->can('NEWS'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                    [
                        'label' =>  self::icon('puzzle').'Text blocks',
                        'url' => ['block/index'],
                        'visible' => Yii::$app->user->can('BLOCK_CRUD'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],

//                    [
//                        'label' =>  self::icon('question').'FAQ',
//                        'url' => ['/faq/index'],
//                        'options' => ['class' => $item_class],
//                        'encode' => false,
//                    ],
                ],
            ],
            [
                'label' =>  self::icon('bag').'Shop',
                'options' => ['class' => $item_class.' nav-dropdown'],
                'url' => '#',
                'visible' => Yii::$app->user->can('PRODUCT') || Yii::$app->user->can('CATEGORY_CRUD'),
                'encode' => false,
                'template' => '<a href="{url}" class="nav-link nav-dropdown-toggle">{label}</a>',
                'items' => [
                    [
                        'label' =>  self::icon('list').'Categories',
                        'url' => ['category/index'],
                        'visible' => Yii::$app->user->can('CATEGORY_CRUD'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                    [
                        'label' =>  self::icon('basket-loaded').'Products',
                        'url' => ['product/index'],
                        'visible' => Yii::$app->user->can('PRODUCT'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                ],
            ],
            [
                'label' =>  self::icon('bubbles').'Forms',
                'options' => ['class' => $item_class.' nav-dropdown'],
                'url' => '#',
                'visible' => Yii::$app->user->can('FORM_CALLBACK') || Yii::$app->user->can('FORM_ORDER'),
                'encode' => false,
                'template' => '<a href="{url}" class="nav-link nav-dropdown-toggle">{label}</a>',
                'items' => [
                    [
                        'label' =>  self::icon('phone').'Callback',
                        'url' => ['form/callback'],
                        'visible' => Yii::$app->user->can('FORM_CALLBACK'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                    [
                        'label' =>  self::icon('layers').'Orders',
                        'url' => ['form/order'],
                        'visible' => Yii::$app->user->can('FORM_ORDER'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                ],
            ],
            [
                'label' =>  self::icon('drawer').'Data base',
                'options' => ['class' => $item_class.' nav-dropdown'],
                'url' => '#',
                'visible' => Yii::$app->user->can('LANGUAGE_CRUD'),
                'encode' => false,
                'template' => '<a href="{url}" class="nav-link nav-dropdown-toggle">{label}</a>',
                'items' => [
                    [
                        'label' =>  self::icon('globe-alt').'Languages',
                        'url' => ['language/index'],
                        'visible' => Yii::$app->user->can('LANGUAGE_CRUD'),
                        'options' => ['class' => $item_class],
                        'encode' => false,
                    ],
                ],
            ],
            [
                'label' => self::icon('globe').'SEO',
                'url' => ['seo/index'],
                'visible' => Yii::$app->user->can('SEO_CRUD'),
                'options' => ['class' => $item_class],
                'encode' => false,
            ],
        ];
    }


    private static function icon($icon){
        return Html::tag('i', '', ['class' => 'icon-'.$icon]);
    }
}