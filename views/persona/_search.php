<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\personaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cedulaPersona') ?>

    <?= $form->field($model, 'primerNombre') ?>

    <?= $form->field($model, 'segundoNombre') ?>

    <?= $form->field($model, 'primerApellido') ?>

    <?= $form->field($model, 'segundoApelllido') ?>

    <?php // echo $form->field($model, 'fechaNacimiento') ?>

    <?php // echo $form->field($model, 'edad') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'incapacidad') ?>

    <?php // echo $form->field($model, 'pensionado') ?>

    <?php // echo $form->field($model, 'TipoIdentificacion_idTipoIdentificacion') ?>

    <?php // echo $form->field($model, 'NivelInstruccion_idNivelInstruccion') ?>

    <?php // echo $form->field($model, 'EstadosCiviles_idEstadosCiviles') ?>

    <?php // echo $form->field($model, 'Cargo_idCargo') ?>

    <?php // echo $form->field($model, 'ConsejoComunal_idConsejoComunal') ?>

    <?php // echo $form->field($model, 'Persona_cedulaPersona') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
