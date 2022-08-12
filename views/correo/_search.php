<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CorreoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="correo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdCorreo') ?>

    <?= $form->field($model, 'Host') ?>

    <?= $form->field($model, 'Username') ?>

    <?= $form->field($model, 'Password') ?>

    <?= $form->field($model, 'Port') ?>

    <?php // echo $form->field($model, 'SetFrom') ?>

    <?php // echo $form->field($model, 'SetFromName') ?>

    <?php // echo $form->field($model, 'AddAddress') ?>

    <?php // echo $form->field($model, 'AddAddressName') ?>

    <?php // echo $form->field($model, 'Addcc') ?>

    <?php // echo $form->field($model, 'Titulo') ?>

    <?php // echo $form->field($model, 'Cuerpo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
