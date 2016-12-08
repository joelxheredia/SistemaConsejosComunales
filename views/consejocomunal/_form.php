<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\Usuario;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
  <div class="col-sm-4">
  
  <div class="list-group">
  <a href="#" class="list-group-item text-center">Consejos Comunales</a>
  <a href="#" class="list-group-item">Registrar Consejo Comunal</a>
  <a href="#" class="list-group-item">Listar Consejo Comunal</a>
  <a href="#" class="list-group-item">Contactar Vocero</a>
</div>

  </div>

  <div class="col-sm-8">

    <?php $form = ActiveForm::begin([
      'options' => ['class' => 'form-horizontal'],

    ]); ?>

    <div class="form-group">
      <label class="control-label col-sm-2"></label> 

    </div>

    <div class="form-group">

    <label class="control-label col-sm-2" >Municipio:</label>
    <div class="col-sm-4">

       <?= Html::activeDropDownList($municipios, 'idMunicipios',   ArrayHelper::map(Municipios::find()->where(['Estados_idEstados'=>$e])->all(),'idMunicipios','nombreMunicipios'),
          ['prompt'=>'Seleccione Municipio',
                'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarparroquias?id="+$(this).val(), function(data){
                 $( "select#consejocomunal-parroquias_idparroquias" ).html( data );      
            });',
            'class' =>'form-control',

            ]
      ) ?>

     
    </div>
    <label class="control-label col-sm-2" for="email">Parroquia:</label>
    <div class="col-sm-4">
      <?= Html::activeDropDownList($model, 'Parroquias_idParroquias',ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
         ['prompt'=>'Seleccione Parroquia',
          'class' =>'form-control',
      ]) ?>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Nombre</label>
    <div class="col-sm-10"> 
      <?= Html::activeInput('text', $model, 'NombreConsejoComunal', ['class' => 'form-control', 'placeholder'=>'Nombre del Consejo Comunal', 'required'=> true]) ?>
      <?= Html::error($model, 'NombreConsejoComunal', ['class' => 'text-error']) ?>
    </div>

  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Fecha</label>
    <div class="col-sm-10"> 

       <?php 
        
        echo DatePicker::widget([ 
            'model' => $model,
            'attribute' => 'fechaInscripcionConsejoComunal',
            'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control', 'placeholder'=>'fecha incripción', 'required'=> true]
        ]);

      
    ?>
     
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Correo</label>
    <div class="col-sm-10"> 
      <?= Html::activeInput('email',$usuario, 'correoElectronico', ['class' => 'form-control', 'placeholder'=>'correoVocero@ejemplo.com', 'required'=> true]) ?>
      <?= Html::error($usuario, 'correoElectronico', ['class' => 'text-error']) ?>
    </div>
  </div> 
    
    <div class="form-group text-center">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<!--
<iframe src="https://www.google.com/maps/d/embed?mid=1WLm4ucnd6N9Gt5pSawFledkzZiU&hl=es" width="640" height="480"></iframe>
-->



<!--    <?php /*echo Yii::$app->getUrlManager()->getBaseUrl()."/consejocomunal/listarparroquias?id="."djn";*/ ?>-->

