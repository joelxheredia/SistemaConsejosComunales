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
      <label for="">Táchira</label>
    </div>


     <?= $form->field($municipios, 'idMunicipios')->dropDownList(
            ArrayHelper::map(Municipios::find()->where(['Estados_idEstados'=>19])->all(),'idMunicipios','nombreMunicipios'),
            ['prompt'=>'Seleccione Municipio',
                'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarparroquias?id="+$(this).val(), function(data){
                 $( "select#consejocomunal-parroquias_idparroquias" ).html( data );      
            });',

            ]
      ) ?>

       <?= $form->field($model, 'Parroquias_idParroquias')->dropDownList(
        ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
        ['prompt'=>'Seleccione Parroquia']
    ) ?>  

    <?= $form->field($model, 'NombreConsejoComunal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaInscripcionConsejoComunal')->textInput()->label('Fecha ') ?>
    
    <?= $form->field($usuario, 'correoElectronico')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>


<!--    <?php /*echo Yii::$app->getUrlManager()->getBaseUrl()."/consejocomunal/listarparroquias?id="."djn";*/ ?>-->

