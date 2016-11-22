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
    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-12">
                <strong>
                    Por nombre:
                </strong>
                <input placeholder="buscar"/>
                <?= $form->field($buscar, 'buscar')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <strong>
                    Estado:
                </strong>
                <?= $form->field($buscar, 'estado')->dropDownList(
            ArrayHelper::map(EstadosVenezuela::find()->all(),'idEstadosVenezuela','descripcionEstados'),
            ['prompt'=>'Seleccione Estado']
      ) ?>
                <select required>
                    <option value = "">Seleccionar</option>
                    <option value = "1">Opción 1</option>
                </select>
                <strong>
                    Municipio:
                </strong>
                <select required>
                    <option value = "">Seleccionar</option>
                </select>
                <strong>
                    Parroquia:
                </strong>
                <select required>
                    <option value = "">Seleccionar</option>
                </select>
                 <input type="submit" value="Submit">
            </div>
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
        <?php foreach ($estadosVenezuela as $estado) {?>
    	<div class="row">
    		<div class="col-md-12">
    			Estado <?php echo $estado->descripcionEstados;?>
    		</div>
    	</div>
        <?php foreach ($estado->municipios as $municipio) {?>
    	<div class="row">
    		<div class="col-md-12">
                Municipio <?php echo $municipio->nombreMunicipios;?>
    		</div>
    	</div>
        <?php foreach ($municipio->parroquias as $parroquia) {?>
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
