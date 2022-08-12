<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Correo */

$this->title = 'Crear Correo';
$this->params['breadcrumbs'][] = ['label' => 'Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
