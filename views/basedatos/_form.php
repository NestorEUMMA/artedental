<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Limpiartablas */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= Html::encode($this->title) ?></h5>
      </div>
<div class="ibox-content">
  <?php $form = ActiveForm::begin(); ?>
  <form class="form-horizontal">
  <div class="form-group">
        <!-- <?= $form->field($model, 'IdLimpiarTabla')->textInput() ?> -->

    <?= $form->field($model, 'Query')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Orden')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'Activo')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'Activo')->checkbox() ?>
   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>
