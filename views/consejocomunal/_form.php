<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Parroquias;
use app\models\Municipios;
/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consejocomunal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreConsejoComunal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaInscripcionConsejoComunal')->textInput() ?>

	 <?= $form->field($model, 'Parroquias_idParroquias')->dropDownList(
	    	ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
	    	['prompt'=>'Seleccione Parroquia']
	  ) ?>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
