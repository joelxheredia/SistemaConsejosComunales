<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoSolicitud;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitudes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
  <div class="col-sm-4">
  
  <div class="list-group">
  <a href="#" class="list-group-item text-center">Solicitudes Consejos Comunales</a>
  <a href="#" class="list-group-item">Listar Solicitudes</a>
</div>

  </div>

<div class="col-sm-8">
    <?php $form = ActiveForm::begin(); ?>

    
    <div class="form-group">
    <label class="control-label" for="pwd">Fecha de Solicitud</label>
    <div class=""> 

       <?php 
        
        echo DatePicker::widget([ 
            'model' => $model,
            'attribute' => 'fechaRealizacion',
            'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control', 'placeholder'=>'Fecha de Solicitud', 'required'=> true]
        ]);
      
    ?>
     
    </div>


    
    <label class="control-label">Solicitudes Disponibles</label>
    
      <?= Html::activeDropDownList($model, 'TipoSolicitud_idTipoSolicitud',ArrayHelper::map(TipoSolicitud::find()->all(),'idTipoSolicitud','descripcionTipoSolicitud'),
         ['prompt'=>'Seleccionar Solicitud',
          'class' =>'form-control',
      ]) ?>


    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar Solicitud' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
