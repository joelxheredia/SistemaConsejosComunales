<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */

$this->title = 'Verificar Carta';
$this->params['breadcrumbs'][] = ['label' => 'Consejo Comunal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="text-center">Validar Cartas</h1>
<p>Ingrese el codigo que se encuentra en la parte superior de la carta, esta opcion le permite comprobar que la carta en sus manos fue emitida por el consejo comunal correspondiente</p>


<div>
	
	 <?php $form = ActiveForm::begin([
      'options' => ['class' => 'form-horizontal'],

    ]); ?>

   <div class="form-group">
   	  <label class="control-label col-sm-2" for="pwd">Nro Identificación</label>
    <div class="col-sm-4"> 
        <?= $form->field($model, 'codReferecia')->label(false); ?>
    </div>
   </div>
   <div class="text-center"><h4 class="text-info"><?php echo $resul; ?></h4></div>

    <div class="form-group text-center">

        <?= Html::submitButton('Verificar Validez Carta', ['class' => 'btn btn-info btn-lg']) ?>
    </div>

     <?php ActiveForm::end(); ?>
</div>

