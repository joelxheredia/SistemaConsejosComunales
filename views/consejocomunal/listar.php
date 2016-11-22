<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\EstadosVenezuela;
use app\models\Consejocomunal;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = 'Buscar Consejos Comunales';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-vertical'],
        'fieldConfig' => [
         'options' => [
            'tag' => false,
        ],
            //'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'template' => '<div class="col-md-4">{input}</div>',
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ]]); ?>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($buscar, 'buscar')->textInput(['maxlength' => true, 'class'=>'', 'value'=> 'fd'.$buscar->buscar]) ?>
            </div>
        </div>

        <div class="row">
                <?= $form->field($buscar, 'estado')->dropDownList(
            ArrayHelper::map(EstadosVenezuela::find()->all(),'idEstadosVenezuela','descripcionEstados'),
            ['prompt'=>'Seleccione Estado', 'value'=>$buscar->estado]
            ) ?>
                <?= $form->field($buscar, 'municipio')->dropDownList(
            ArrayHelper::map(Municipios::find()->all(),'idMunicipios','nombreMunicipios'),
            ['prompt'=>'Seleccione Municipio',]
            ) ?>
                <?= $form->field($buscar, 'parroquia')->dropDownList(
            ArrayHelper::map(Parroquias::find()->all(),'idParroquias','NombreParroquia'),
            ['prompt'=>'Seleccione Parroquia']
            ) ?>    
        </div>
        <div class="row">
<input type="submit" value="Submit">
        </div>
       

    <div class="form-group">
        <?= Html::submitButton('buscar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    	<div class="row">
    		<div class="col-md-12">
    			Consejos Comunales
    		</div>
    	</div>
        <?php foreach ($estadosVenezuela as $estado) { $labelEstado = false; ?>
    	
        <?php foreach ($estado->municipios as $municipio) { $labelMunicipio = false; ?>
        <?php foreach ($municipio->parroquias as $parroquia) { if(count($parroquia->consejocomunals)<=0) break;?>
        <?php if(!$labelEstado){ $labelEstado = true; ?>
        <div class="row">
            <div class="col-md-12">
                Estado <?php echo $estado->descripcionEstados;?>
            </div>
        </div>
        <?php }?>
        <?php if(!$labelMunicipio){ $labelMunicipio = true; ?>
        <div class="row">
            <div class="col-md-12">
                Municipio <?php echo $municipio->nombreMunicipios;?>
            </div>
        </div>
        <?php }?>
    	<div class="row">
    		<div class="col-md-12">
                Parroquia <?php echo $parroquia->NombreParroquia;?>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
    			<table class="table table-bordered" id="tabla">
    				<thead>
    					<tr>
    						<th width="">Nombre</th>
    						<th width="">Fecha Inscripción</th>
    					</tr>
    				</thead>
    				<tbody>
                        <?php foreach ($parroquia->consejocomunals as $consejo) {?>
    					<tr>
    						<td><?php echo $consejo->NombreConsejoComunal;?></td>
                            <td><?php echo $consejo->fechaInscripcionConsejoComunal;?></td>
    					</tr>
                        <?php }?>
    				</tbody>

    			</table>
    		</div>
    	</div>
        <?php }}}?>

    	<!--Dejar esto para copiar -->
    	<div class="row">
    		<div class="col-md-12"></div>
    	</div>
</div>


<!-- Código js -->
<script type="text/javascript">
	$(document).ready(function() {
    	$('#tabla').DataTable();
	} 
	);
</script>
