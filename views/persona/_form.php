<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'primerNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoApelllido')->textInput(['maxlength' => true]) ?>

    

    <?php 
        echo '<label>Fecha de Nacimiento</label><br>'; 
        echo DatePicker::widget([ 
            'model' => $model,
            'attribute' => 'fechaNacimiento',
            'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control']
        ]);
        
        echo "<label></label><br>";

        
    ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'sexo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'incapacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pensionado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TipoIdentificacion_idTipoIdentificacion')->textInput() ?>

    <?= $form->field($model, 'NivelInstruccion_idNivelInstruccion')->textInput() ?>

    <?= $form->field($model, 'EstadosCiviles_idEstadosCiviles')->textInput() ?>

    <?= $form->field($model, 'Cargo_idCargo')->textInput() ?>

    <?= $form->field($model, 'ConsejoComunal_idConsejoComunal')->textInput() ?>

    <?= $form->field($model, 'Persona_cedulaPersona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
