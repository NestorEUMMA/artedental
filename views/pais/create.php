<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = 'Crear Pais';
$this->params['breadcrumbs'][] = ['label' => 'Pais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
