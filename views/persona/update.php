<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\persona */

$this->title = 'Actualizar Paciente: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName, 'url' => ['view', 'id' => $model->IdPersona]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
