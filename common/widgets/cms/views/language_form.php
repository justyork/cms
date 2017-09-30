<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 26.09.2017
 * Time: 17:32
 */
use yii\helpers\Html;

?>


<div>
    <h4><?=Yii::t('app', 'Translates')?></h4>

    <ul class="nav nav-tabs" role="tablist">
        <?$i = 0; foreach ($langs as $lng):?>
        <li class="nav-item">
            <a href="#lng-<?=$lng->code?>" class="nav-link <?=($i == 0 ? 'active' : '')?>" role="tab" aria-controls="lng-<?=$lng->code?>" data-toggle="tab">
                <?=$lng->name?>
            </a>
        </li>
        <? $i++; endforeach;?>
    </ul>


    <div class="tab-content">
        <?$i = 0; foreach ($langs as $lng):?>
            <div class="tab-pane <?=($i == 0 ? 'active' : '')?>" id="lng-<?=$lng->code?>" role="tabpanel">
                <?foreach ($columns as $field => $attr):?>
                    <div class="form-group">
                        <?=$model->LangField($field, $lng, $attr)?>
                    </div>
                <? endforeach;?>

            </div>
        <? $i++; endforeach;?>
    </div>

</div>