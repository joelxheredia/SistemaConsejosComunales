<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\Tipoidentificacion;
use app\models\Nivelinstruccion;
use app\models\Estadosciviles;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\EstadosVenezuela;
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


	     <?php $formjf = ActiveForm::begin([
			      'options' => ['class' => 'form-horizontal'],

			    ]); ?>

 <div  class="list-group">
	<a href="#demo1" class="list-group-item opcion" data-toggle="collapse">Informacion de Ubicación<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo1">
	 	<div class="list-group-item">
	 	
		<div class="form-group">
			
			<div class="col-sm-4">
	      <?= Html::activeDropDownList($estadosV, 'idEstadosVenezuela',   ArrayHelper::map(EstadosVenezuela::find()->all(),'idEstadosVenezuela','descripcionEstados'),
          ['prompt'=>'Seleccione Estado',
                'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarmunicipios?id="+$(this).val(), function(data){
                 $( "select#municipios-idmunicipios" ).html( data );      
	            });',
	            'class' =>'form-control',

	            ]
	      ) ?>
	 		</div>
	 		
	 		<div  class="col-sm-4">
	 			   <?= Html::activeDropDownList($municipios, 'idMunicipios',   ArrayHelper::map(Municipios::find()->all(),'idMunicipios','nombreMunicipios'),
		          ['prompt'=>'Seleccione Municipio',
		                'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarparroquias?id="+$(this).val(), function(data){
		                 $( "select#parroquias-idparroquias" ).html( data );      
			            });',
			            'class' =>'form-control',

			            ]
			      ) ?>
	 		
	 		</div>
	 		
	 			<div class="col-sm-4">

	 				  <?= Html::activeDropDownList($parroquias, 'idParroquias',ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
				         ['prompt'=>'Seleccione Parroquia',
				           'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarconsejosp?id="+$(this).val(), function(data){
			                 $( "select#persona-consejocomunal_idconsejocomunal" ).html( data );      
				            });',
				            'class' =>'form-control', 
				      ]) ?>
	 		
	 				
	 			</div>


	 	</div> 
	 	
	 	<div class="form-group">
				
			  <div class="col-md-6 col-md-offset-3">	
			  	<label class="control-label">Consejo Comunal</label>
	 	      <?= Html::activeDropDownList($model, 'ConsejoComunal_idConsejoComunal',ArrayHelper::map(Consejocomunal::find()->all(),'idConsejoComunal','NombreConsejoComunal'),
		         ['prompt'=>'Seleccione consejo comunal',
		          'class' =>'form-control',
		      ]); ?>

		      </div>
	 		
	 	</div>

	 	<div class="form-group">

	 		  <div class="col-md-6 col-md-offset-3">
				<label class="control-label">Dirección</label>
	 	       <?= $formjf->field($model, 'direccion')->textInput(['class' => 'form-control'])->label(false); ?>
	 			
	 			</div>
	 	</div>	 	

	 	</div>
	</div>


	<a href="#demo2" class="list-group-item" data-toggle="collapse">Datos Personales Jefe de Familia<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo2">
		<div  class="list-group-item">
		 <!--  <?/*= $this->render('_form', [
	        'model' => $model,
	       	'municipios' => $municipios,
	    ]) */?>-->

			      
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
						                $listData, [ 'class' =>'form-control'])->label(false);

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

		</div>		
	</div>

    <a href="#demo3" class="list-group-item" data-toggle="collapse">Miembros de la Familia<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo3">
		<div class="row">
			<a id='masmiembro' class="btn btn-success">Añadir miembro</a>
		<div class="col-md-10 col-md-offset-1">
		<div  class="list-group" id="listamiembros">
		<a href="#persona1" class="list-group-item opcion" data-toggle="collapse">Miembro 1<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
		<div class="collapse" id="persona1">

		<div  class="list-group-item">
		 	 			
		 	 			<div class="form-group">
					  <div class="col-md-10 col-md-offset-1">
					  
	 			     	 <label class="control-label col-md-3" for="pwd"> Tipo Identificacion</label>
					    <div class="col-md-3">
					    	 <?php 
					        $tiposId = Tipoidentificacion::find()->all();        
					        $listData=ArrayHelper::map($tiposId,'idTipoIdentificacion','descripcion');

					        echo Html::dropDownList("persona1-tipoidentificacion",null,
					                $listData,['prompt'=>'Seleccione Tipo', 'class' =>'form-control']);

					       ?>
					    </div>
					     <label class="control-label col-md-2" for="pwd">Cedula</label>
					    
					    <div class="col-md-3">
					      <?= Html::textInput("persona1-cedula",null,
					      ['maxlength' => true, 'class' => 'form-control']); ?>
					    </div>

				    </div>
				   </div>

				  <div class="form-group">
					  <div class="col-md-10 col-md-offset-1">
				  	 <label class="control-label col-md-3" for="pwd"> Primer Nombre</label>
					    <div class="col-md-3">
					    	<?= Html::textInput("persona1-primernombre",null,
					    	['maxlength' => true, 'class' => 'form-control']); ?>
					    </div>
					     <label class="control-label col-md-3" for="pwd">Segundo Nombre</label>
					    <div class="col-md-3">
					       <?= Html::textInput("persona1-segundonombre",null,
					    	['maxlength' => true, 'class' => 'form-control']); ?>
					    </div>
					    </div>
				  </div>

				   <div class="form-group">
					  <div class="col-md-10 col-md-offset-1">
				  	 <label class="control-label col-md-3" for="pwd"> Primer Apellido</label>
					    <div class="col-md-3">
					    	  <?= Html::textInput("persona1-primerapellido",null,
					    	['maxlength' => true, 'class' => 'form-control']); ?>
					    </div>
					     <label class="control-label col-md-3" for="pwd">Segundo Apellido</label>
					    <div class="col-md-3">
					       <?= Html::textInput("persona1-segundoapellido",null,
					    	['maxlength' => true, 'class' => 'form-control']); ?>
					    </div>
					    </div>
				  </div>


				  <div class="form-group">
					  <div class="col-md-10 col-md-offset-1">
					    <label class="control-label col-md-3" for="pwd">Fecha Nacimiento</label>
					    <div class="col-md-3"> 
					       <?php 
					        echo DatePicker::widget([ 
					            'name' => 'persona1-fechanacimiento',
					            'language' => 'es',
					            'dateFormat' => 'yyyy-MM-dd',
					            'options' => ['class' => 'form-control', 'placeholder'=>'', 'required'=> true]
					        ]);
					      
					    ?>
					    </div>
					    <label class="control-label col-md-3" for="pwd">Sexo</label>
					    <div class="col-md-2">
					    	 <?php

							    $a=['M'=>'Masculino','F'=>'Femenino'];
							    echo Html::radioList("persona1-sexo", null,$a);
							    ?>
				 </div>
				 </div>
				  </div>

				  <div class="form-group">
					  <div class="col-md-10 col-md-offset-1">
				  	   <label class="control-label col-md-3" for="pwd">Estado Civil</label>
					    <div class="col-md-3"> 
							    <?php 
							        $estadosCiv = Estadosciviles::find()->all();        
							        $listData=ArrayHelper::map($estadosCiv,'idEstadosCiviles','decripcion');

							        echo Html::dropDownList("persona1-estadocivil",null,
					                $listData,['prompt'=>'Seleccione estado', 'class' =>'form-control']);

							    ?> 
					    </div>
					    <label class="control-label col-md-3" for="pwd">Nivel Instrucción</label>
					    <div class="col-md-3"> 
							   
						      <?php 
						        $nivelInst = Nivelinstruccion::find()->all();        
						        $listData=ArrayHelper::map($nivelInst,'idNivelInstruccion','descripcion');

						        echo Html::dropDownList("persona1-nivelinstuccion",null,
					                $listData,['prompt'=>'Seleccione nivel', 'class' =>'form-control']);

						    ?>   
					    </div>
				  </div>
				  </div>

				  <div  class="form-group">
					  <div class="col-md-10 col-md-offset-1">
				  	    <label class="control-label col-md-4" for="pwd">¿Posee alguna discapacidad?</label>
				  	    <div class="col-md-2">
				  	    	    <?php 
						    $inca=['F'=>'No','V'=>'Si'];
						    echo Html::dropDownList("persona1-discapacidad",null,
					                $inca,['class' =>'form-control']);
						    ?>
				  	    </div>
				  	    <label class="control-label col-md-3" for="pwd">¿Es Pensionado?</label>
				  	    <div class="col-md-2">
						    <?php 
						    $pen=['F'=>'No', 'V'=>'Si'];
						    echo Html::dropDownList("persona1-pensionado",null,
					                $pen,['class' =>'form-control']);
						    ?>
				  	    </div>
				  </div>
				  </div>
			</div>
			</div>

		</div>
		</div>
		</div>
	</div>
		

	<a href="#demo4" class="list-group-item" data-toggle="collapse">Datos de la cuenta<span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
	<div class="collapse" id="demo4">
		<div  class="list-group-item">
				<div class="form-group">
	 	 	<div class="col-sm-2"></div>
	 	 	<?= Html::activeInput('text', $usuario, 'nombreUsuario', ['class' => 'col-sm-8 ', 'placeholder'=>'email', 'required'=> true]) ?>
				<br><br>	
					<div class="col-sm-2"></div> 	 		
	 	 	<?= Html::activeInput('password', $usuario, 'contrasena', ['class' => 'col-sm-8 ', 'placeholder'=>'contraseña', 'required'=> true]) ?>
	 	 		<br><br>
	 	 			<div class="col-sm-2"></div>
	 	 	<?= Html::activeInput('password', $usuario, 'contrasena2', ['class' => 'col-sm-8', 'placeholder'=>'confirme contraseña', 'required'=> true]) ?>
	 	 	
	 	 	</div>
	
		</div>
	</div>


</div>

<div class="form-group text-center">
			        <?= Html::submitButton('Guardar', ['class' =>'btn btn-info']) ?>
</div>

			   <?php ActiveForm::end(); 
			   $this->registerJs('
			   ini();
			   //miembro();
			   $("#masmiembro" ).click(function() {
  				miembro();
				});
			   '
				);
				?>

<script >

function ini(){
	cantidad = 2;

}

function miembro(){
	$("#listamiembros").append(
				'<a href=\"#persona'+cantidad+'\" class=\"list-group-item opcion\" data-toggle=\"collapse\">'+
				'Miembro '+cantidad+'<span class=\"glyphicon glyphicon-plus-sign pull-right\"></span></a><div class=\"collapse\" id=\"persona'+cantidad+'\"><div  class="list-group-item">'+
				'<div class=\"form-group\"><div class=\"col-md-10 col-md-offset-1\"><label class=\"control-label col-md-3\" for=\"pwd\"> Tipo Identificacion</label>'+
				'<div class=\"col-md-3\">'+
				<?php  $tiposId = Tipoidentificacion::find()->all(); 
				$listData=ArrayHelper::map($tiposId,'idTipoIdentificacion','descripcion');
				echo "'".str_replace("&#039;","'",str_replace("\n","",Html::dropDownList("persona'+cantidad+'-tipoidentificacion",null,
				$listData,['prompt'=>'Seleccione Tipo', 'class' =>'form-control'])))."</div>'+";?>
				'<label class="control-label col-md-2" for="pwd">Cedula</label><div class="col-md-3">'+
				<?php echo "'".str_replace("&#039;","'",str_replace("\n","",Html::textInput("persona'+cantidad+'-cedula",null,['maxlength' => true, 'class' => 'form-control'])))."</div></div></div>'+"; ?>
				//nombres
				'<div class="form-group"><div class="col-md-10 col-md-offset-1"><label class="control-label col-md-3" for="pwd"> Primer Nombre</label><div class="col-md-3">'+
				<?= "'".str_replace("&#039;","'",str_replace("\n","",Html::textInput("persona'+cantidad+'-primernombre",null,
					    	['maxlength' => true, 'class' => 'form-control'])))."</div>'+"; ?>
				'<label class="control-label col-md-3" for="pwd">Segundo Nombre</label><div class="col-md-3">'+
				<?= "'".str_replace("&#039;","'",str_replace("\n","",Html::textInput("persona'+cantidad+'-segundonombre",null,
					    	['maxlength' => true, 'class' => 'form-control'])))."</div></div></div>'+"; ?>
				//apellidos
				'<div class="form-group"><div class="col-md-10 col-md-offset-1"><label class="control-label col-md-3" for="pwd"> Primer Apellido</label><div class="col-md-3">'+
				<?= "'".str_replace("&#039;","'",str_replace("\n","",Html::textInput("persona'+cantidad+'-primerapellido",null,
					    	['maxlength' => true, 'class' => 'form-control'])))."</div>'+"; ?>
				'<label class="control-label col-md-3" for="pwd">Segundo Apellido</label><div class="col-md-3">'+
				<?= "'".str_replace("&#039;","'",str_replace("\n","",Html::textInput("persona'+cantidad+'-segundoapellido",null,
					    	['maxlength' => true, 'class' => 'form-control'])))."</div></div></div>'+"; ?>
				//fecha y sexo
				'<div class="form-group"><div class="col-md-10 col-md-offset-1"><label class="control-label col-md-3" for="pwd">Fecha Nacimiento</label><div class="col-md-3">'+
				<?php 
				echo "'".str_replace("&#039;","'",str_replace("\n","",DatePicker::widget([ 
					            'name' => "persona'+cantidad+'-fechanacimiento",
					            'language' => 'es',
					            'dateFormat' => 'yyyy-MM-dd',
					            'options' => ['class' => 'form-control', 'placeholder'=>'', 'required'=> false]
					        ])))."</div>'+";?>
				'<label class="control-label col-md-3" for="pwd">Sexo</label><div class="col-md-2">'+
				<?php
						$a=['M'=>'Masculino','F'=>'Femenino'];
						echo "'".str_replace("&#039;","'",str_replace("\n","",Html::radioList("persona'+cantidad+'-sexo", null,$a)))."</div></div></div>'+"; ?>
				//estado civil y nivel de instruccion
				'<div class="form-group"><div class="col-md-10 col-md-offset-1"><label class="control-label col-md-3" for="pwd">Estado Civil</label><div class="col-md-3">'+
				<?php 
				$estadosCiv = Estadosciviles::find()->all();   
				$listData=ArrayHelper::map($estadosCiv,'idEstadosCiviles','decripcion');
				echo "'".str_replace("&#039;","'",str_replace("\n","",Html::dropDownList("persona'+cantidad+'-estadocivil",null,
					$listData,['prompt'=>'Seleccione estado', 'class' =>'form-control'])))."</div>'+"; ?>
				'<label class="control-label col-md-3" for="pwd">Nivel Instrucción</label><div class="col-md-3">'+
				<?php 
				$nivelInst = Nivelinstruccion::find()->all();   
				$listData=ArrayHelper::map($nivelInst,'idNivelInstruccion','descripcion');
				echo "'".str_replace("&#039;","'",str_replace("\n","",Html::dropDownList("persona'+cantidad+'-nivelinstuccion",null,
					                $listData,['prompt'=>'Seleccione nivel', 'class' =>'form-control'])))."</div></div></div>'+";?>   
				//discapacidad y es pensionado
				'<div class="form-group"><div class="col-md-10 col-md-offset-1"><label class="control-label col-md-4" for="pwd">¿Posee alguna discapacidad?</label><div class="col-md-2">'+
				<?php 
				$inca=['F'=>'No','V'=>'Si'];
				echo "'".str_replace("&#039;","'",str_replace("\n","",Html::dropDownList("persona'+cantidad+'-discapacidad",null,
					                $inca,['class' =>'form-control'])))."</div>'+";; ?>
				'<label class="control-label col-md-3" for="pwd">¿Es Pensionado?</label><div class="col-md-2">'+
				<?php 
				$pen=['F'=>'No', 'V'=>'Si'];
				echo "'".str_replace("&#039;","'",str_replace("\n","",Html::dropDownList("persona'+cantidad+'-pensionado",null,
					$pen,['class' =>'form-control'])))."</div></div></div>'+";;
						    ?>	    


				'</div></div>');
/*




*/
cantidad++;

}



					 


					    


</script>







