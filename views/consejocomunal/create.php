<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */

$this->title = 'Create Consejocomunal';
$this->params['breadcrumbs'][] = ['label' => 'Consejo Comunal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consejocomunal-create">

    <h1 class="text-center">Registrar Consejo Comunal <small>(<?php echo $ne; ?>)</small><!--<?php /*Html::encode($this->title) */?>--></h1>

    <?= $this->render('_form', [
        'model' => $model,
       	'municipios' => $municipios,
       	'usuario'=>$usuario,
<<<<<<< HEAD
         'e'=>$e,
=======
         'est' => $est,
>>>>>>> 5b555b53e2fa50d2a5ca3691973f23b75a4a2e6e
    ]) ?>

    <div id="map" style="height: 450px; width:600px"></div>
   <input class='btn btn-primary' type="button" name="iniciar" id="iniciar" value="Iniciar de nuevo" onclick="javascript:iniciar();">
   <input class='btn btn-primary' type="button" name="borrar" id="borrar" value="borrar marca" onclick="javascript:borrar();">
   <input class='btn btn-primary' type="button" name="guardar" id="guardar" value="Finalizar" onclick="javascript:guardar();">
   <input class='btn btn-primary' type="button" name="ver" id="ver" value="Ver area seleccionada"  onmousedown="javascript:crear_poligono();javascript:mostrar();" onmouseup="javascript:ocultar();">
   <div id="mostrar">
<?php
         /*$this->registerJsFile("http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js");
         $this->registerJsFile('http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBl1izE1b8j0M8y1GuX-VvbvOMmG27fFoA');
         $this->registerJs('
          load();
          ');*/
        ?>
  </div>
</div>


</div>
