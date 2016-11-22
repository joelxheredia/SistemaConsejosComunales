<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\persona */

$this->title = 'Update Persona: ' . $model->cedulaPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedulaPersona, 'url' => ['view', 'id' => $model->cedulaPersona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
