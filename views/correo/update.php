<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Correo */

$this->title = 'Actualizar Correo: ' . $model->IdCorreo;
$this->params['breadcrumbs'][] = ['label' => 'Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdCorreo, 'url' => ['view', 'id' => $model->IdCorreo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
