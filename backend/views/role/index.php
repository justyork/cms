<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 02.10.2017
 * Time: 16:04
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View
 *
 */

$this->title = Yii::t('app', 'Roles');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$(document).ready(function(){
    $('.switch-role').change(function(){
        var is_checked = $(this).is(':checked');
        var role = $(this).attr('data-role-id');
        if(is_checked)
            $('[data-role=\''+role+'\']').attr('checked', true);
        else
            $('[data-role=\''+role+'\']').attr('checked', false);
    });
    $('.save-role').click(function(){ $('#role-form').submit() });  
})");

?>

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <strong><?= Html::encode($this->title) ?></strong>
            </div>
            <div class="card-block">

                <p>
                    <?=Html::a(Yii::t('app', 'Save'), '#', ['class' => 'btn btn-success save-role'])?>
                    <?=Html::a(Yii::t('app', 'Add role'), '#', ['class' => 'btn btn-primary', 'data-toggle' => 'role-block'])?>
                    <?=Html::a(Yii::t('app', 'Add action'), '#', ['class' => 'btn btn-primary', 'data-toggle' => 'action-block'])?>

                    <div class="row">
                        <div  class="card col-md-4 col-sm-6 hidden"  id="action-block">
                            <p>
                                <?php $form = ActiveForm::begin(['id' => 'add-action-form']); ?>
                            <h4><?=Yii::t('app', 'Create action')?></h4>
                            <div class="form-group">
                                <label for=""><?=Yii::t('app', 'Name')?></label>
                                <?=Html::textInput('Action[name]', '', ['class' => 'form-control'])?>
                            </div>
                            <div class="form-group">
                                <label for=""><?=Yii::t('app', 'Description')?></label>
                                <?=Html::textInput('Action[description]', '', ['class' => 'form-control'])?>
                            </div>
                            <?=Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success'])?>
                            <?php ActiveForm::end(); ?>
                            </p>
                        </div>

                        <div  class="card col-md-4 col-sm-6 hidden" id="role-block">
                            <p>
                                <?php $form = ActiveForm::begin(['id' => 'add-role-form']); ?>
                            <h4><?=Yii::t('app', 'Create role')?></h4>

                            <div class="form-group">
                                <label for=""><?=Yii::t('app', 'Name')?></label>
                                <?=Html::textInput('Role[name]', '', ['class' => 'form-control'])?>
                            </div>
                            <div class="form-group">
                                <label for=""><?=Yii::t('app', 'Description')?></label>
                                <?=Html::textInput('Role[description]', '', ['class' => 'form-control'])?>
                            </div>

                            <?=Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success'])?>
                            <?php ActiveForm::end(); ?>
                            </p>
                        </div>
                    </div>

                </p>
                <?php $form = ActiveForm::begin(['id' => 'role-form']); ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <?foreach (Yii::$app->authManager->getRoles() as $role):?>
                                <th>
                                    <label>
                                        <?=$role->name ?>
                                        <label class="switch switch-3d <?=$role->name == 'admin' ? 'switch-secondary' : 'switch-success'?>">
                                            <input type="checkbox"
                                                   <?=$role->name == 'admin' ? 'disabled' : ''?>
                                                   class="switch-input switch-role"
                                                   data-role-id="<?=$role->name?>" >
                                            <span class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </label>
                                </th>
                            <? endforeach;?>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach (Yii::$app->authManager->getPermissions() as $action):?>
                            <tr>
                                <td><?=$action->description ?></td>

                                <?foreach (Yii::$app->authManager->getRoles() as $role):?>
                                    <?php
                                        $perm = Yii::$app->authManager->getPermissionsByRole($role->name);
                                    ?>
                                    <td>
                                        <label class="switch switch-3d <?=$role->name == 'admin' ? 'switch-secondary' : 'switch-success'?>  ">
                                            <input type="checkbox"
                                                   <?=$role->name == 'admin' ? 'disabled' : ''?>
                                                   <?=isset($perm[$action->name]) ? 'checked' : ''?>
                                                   class="switch-input"
                                                   name="Assign[<?=$role->name?>][<?=$action->name?>]"
                                                   data-role="<?=$role->name?>">

                                            <span class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </td>
                                <? endforeach;?>
                            </tr>
                        <? endforeach;?>
                        </tbody>
                    </table>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
