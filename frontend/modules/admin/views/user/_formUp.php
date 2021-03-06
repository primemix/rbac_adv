<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
/* @var $roles app\modules\admin\models\Role */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'status')->dropDownList([
        '10' => 'Active',
        '20' => 'Deactivate',
    ]) ?>

    <?php
    $roles = Yii::$app->authManager;
    $roles = $roles->getRoles();
    $items = ArrayHelper::getColumn($roles, 'name');
    $params = [
        'role' => 'Укажите Role'
    ];
    ?>
    <?= $form->field($model, 'role')->dropDownList($items, $params); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
