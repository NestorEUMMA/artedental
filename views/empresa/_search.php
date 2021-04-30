<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdEmpresa') ?>

    <?= $form->field($model, 'NombreEmpresa') ?>

    <?= $form->field($model, 'NombreJuridico') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Nit') ?>

    <?php // echo $form->field($model, 'Ruc') ?>

    <?php // echo $form->field($model, 'RepresentanteLegal') ?>

    <?php // echo $form->field($model, 'DuiRepresentante') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
