<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\Usuario;
/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
  <div class="col-sm-4">Opciones</div>

  <div class="col-sm-8">

    <?php $form = ActiveForm::begin([
      'options' => ['class' => 'form-horizontal'],
    ]); ?>

    <div class="form-group">
      <label for="">Mostrar Aqui el estado </label>
    </div>

    <div class="form-group">

    <label class="control-label col-sm-2" >Municipio:</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" placeholder="Enter email">
    </div>
    <label class="control-label col-sm-2" for="email">Parroquia:</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>  

     <?= $form->field($municipios, 'idMunicipios')->dropDownList(
            ArrayHelper::map(Municipios::find()->all(),'idMunicipios','nombreMunicipios'),
            ['prompt'=>'Seleccione Municipio',
                'onchange'=>' $.post("index.php?r=consejocomunal/listarparroquias&id='.'"+$(this).val(), function(data){
                  $( "select#consejocomunal-parroquias_idparroquias" ).html( data );      
             });'    

            ]
      ) ?>

       <?= $form->field($model, 'Parroquias_idParroquias')->dropDownList(
        ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
        ['prompt'=>'Seleccione Parroquia']
    ) ?>  

    <?= $form->field($model, 'NombreConsejoComunal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaInscripcionConsejoComunal')->textInput() ?>
    
  
    <?= $form->field($usuario, 'correoElectronico')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


   

  </div>
</div>



    

