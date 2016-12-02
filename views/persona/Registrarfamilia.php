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
	      <ul>
	 	 	<li>Nombre</li>
	 	 	<li>Apellido</li>
	 	 </ul>
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








