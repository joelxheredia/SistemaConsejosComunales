<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Municipios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="municipios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreMunicipios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estados_idEstados')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
