<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitudes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSolicitudes') ?>

    <?= $form->field($model, 'fechaRealizacion') ?>

    <?= $form->field($model, 'Persona_cedulaPersona') ?>

    <?= $form->field($model, 'ConsejoComunal_idConsejoComunal') ?>

    <?= $form->field($model, 'TipoSolicitud_idTipoSolicitud') ?>

    <?php // echo $form->field($model, 'codReferecia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
