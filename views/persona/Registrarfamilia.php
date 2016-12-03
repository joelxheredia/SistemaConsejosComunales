<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\Tipoidentificacion;
use app\models\Nivelinstruccion;
use app\models\Estadosciviles;
use app\models\Consejocomunal;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\persona */

$this->title = 'Registrar Familia';
$this->params['breadcrumbs'][] = ['label' => 'Registrar Familia', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-create">

    <h1 class="text-center">Registrar Familia</h1>

</div>


 <div  class="list-group">
	<a href="#demo1" class="list-group-item opcion" data-toggle="collapse">Informacion de Ubicación<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo1">
	 	<div class="list-group-item">
	 	 <ul>
	 	 	<li>estado</li>
	 	 	<li>Parroquia</li>
	 	 </ul>

	 	</div>
	</div>


	<a href="#demo2" class="list-group-item" data-toggle="collapse">Datos Personales Jefe de Familia<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo2">
		<div  class="list-group-item">
		 <!--  <?/*= $this->render('_form', [
	        'model' => $model,
	       	'municipios' => $municipios,
	    ]) */?>-->

	     <?php $formjf = ActiveForm::begin([
			      'options' => ['class' => 'form-horizontal'],

			    ]); ?>

			      
 			     <div class="form-group">

 			     	
					  <div class="col-md-8 col-md-offset-2">
					  
	 			     	 <label class="control-label col-sm-3" for="pwd"> Tipo Identificacion</label>
					    <div class="col-sm-1">
					    	 <?php 
					        $tiposId = Tipoidentificacion::find()->all();        
					        $listData=ArrayHelper::map($tiposId,'idTipoIdentificacion','descripcion');

					        echo $formjf->field($model, 'TipoIdentificacion_idTipoIdentificacion')->dropDownList(
					                $listData,[ 'class' =>'form-control'])->label(false);

					       ?>
					    </div>
					     <label class="control-label col-sm-2" for="pwd">Cedula</label>
					    <div class="col-sm-4">
					      <?= $formjf->field($model, 'cedulaPersona')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
					    </div>

				    </div>

				   </div>
				  
				  <div class="form-group">

				  	

				  	 <label class="control-label col-sm-3" for="pwd"> Primer Nombre</label>
					    <div class="col-sm-2">
					    	<?= $formjf->field($model, 'primerNombre')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
					    </div>
					     <label class="control-label col-sm-3" for="pwd">Segundo Nombre</label>
					    <div class="col-sm-2">
					       <?= $formjf->field($model, 'segundoNombre')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
					    </div>

				  	
				  </div>

				   <div class="form-group">

				  	 <label class="control-label col-sm-3" for="pwd"> Primer Apellido</label>
					    <div class="col-sm-2">
					    	  <?= $formjf->field($model, 'primerApellido')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
					    </div>
					     <label class="control-label col-sm-3" for="pwd">Segundo Apellido</label>
					    <div class="col-sm-2">
					       <?= $formjf->field($model, 'segundoApelllido')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false); ?>
					    </div>

				  	
				  </div>


				  <div class="form-group">
				  	
					    <label class="control-label col-sm-3" for="pwd">Fecha Nacimiento</label>
					    <div class="col-sm-2"> 

					       <?php 
					        
					        echo DatePicker::widget([ 
					            'model' => $model,
					            'attribute' => 'fechaNacimiento',
					            'language' => 'es',
					            'dateFormat' => 'yyyy-MM-dd',
					            'options' => ['class' => 'form-control', 'placeholder'=>'', 'required'=> true]
					        ]);
					      
					    ?>
					    </div>
					    <label class="control-label col-sm-3" for="pwd">Sexo</label>
					    <div class="col-sm-2">
					    	 <?php

							    $a=['M'=>'Masculino','F'=>'Femenino'];
							    echo $formjf->field($model, 'sexo')->radioList($a)->label(false);
							    ?>
					
				 </div>
				  </div>

				  <div class="form-group">

				  	   <label class="control-label col-sm-3" for="pwd">Estado Civil</label>
					    <div class="col-sm-2"> 
							    <?php 
							        $estadosCiv = Estadosciviles::find()->all();        
							        $listData=ArrayHelper::map($estadosCiv,'idEstadosCiviles','decripcion');

							        echo $formjf->field($model, 'EstadosCiviles_idEstadosCiviles')->dropDownList(
							                $listData,[ 'class' =>'form-control'])->label(false);

							    ?> 
   
					    </div>
					    <label class="control-label col-sm-3" for="pwd">Nivel Instrucción</label>
					    <div class="col-sm-2"> 
							   
						      <?php 
						        $nivelInst = Nivelinstruccion::find()->all();        
						        $listData=ArrayHelper::map($nivelInst,'idNivelInstruccion','descripcion');

						        echo $formjf->field($model, 'NivelInstruccion_idNivelInstruccion')->dropDownList(
						                $listData, [ 'class' =>'form-control', 'prompt'=>'Seleccione'])->label(false);

						    ?>   
					    </div>
				
				  </div>

				  <div  class="form-group">
				  	    <label class="control-label col-sm-4" for="pwd">¿Posee alguna discapacidad?</label>
				  	    <div class="col-sm-1">
				  	    	    <?php 
						    $inca=['F'=>'No','V'=>'Si'];
						    echo $formjf->field($model,'incapacidad')->dropDownList($inca, [ 'class' =>'form-control' ])->label(false);
						    ?>
				  	    </div>
				  	    <label class="control-label col-sm-3" for="pwd">¿Es Pensionado?</label>
				  	    <div class="col-sm-1">
						    <?php 
						    $pen=['F'=>'No', 'V'=>'Si'];
						    echo $formjf->field($model, 'pensionado')->dropDownList($pen, [ 'class' =>'form-control' ])->label(false);
						    ?>
				  	    </div>
				  </div>

				  <div class="form-group text-center">
			        <?= Html::submitButton('Guardar', ['class' =>'btn btn-info']) ?>
			    </div>

			   <?php ActiveForm::end(); ?>


		</div>		
	</div>

    <a href="#demo3" class="list-group-item" data-toggle="collapse">Miembros de la Familia<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo3">
		<div  class="list-group-item">
		  <ul>
	 	 	<li>Nombre</li>
	 	 	<li>Apellido</li>
	 	 </ul>
		</div>
	</div>


	<a href="#demo4" class="list-group-item" data-toggle="collapse">Datos de la cuenta<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo4">
		<div  class="list-group-item">
		  <ul>
	 	 	<li>Email</li>
	 	 	<li>confirmar</li>
	 	 </ul>
		</div>
	</div>
</div>







