<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Parroquias;
use app\models\Municipios;
use app\models\EstadosVenezuela;
use app\models\Consejocomunal;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\BuscarConsejoForm;

$this->title = 'Buscar Consejos Comunales';
$this->params['breadcrumbs'][] = $this->title;
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

        <div class="row" style='margin-bottom:20px'>
            <div class="col-md-12">
                <label class='col-md-2'>Buscar por nombre: </label>

            <div class='col-md-4'>
                <?= Html::textInput('buscar', $buscar->buscar, ['class' =>'form-control', 'placeholder' => 'Ingrese Nombre']) ?> 
            </div>
            </div>
        </div>

        <div class="row"> 
            <div class='col-md-4'>
                <?= Html::dropDownList('estado',$buscar->estado,
            ArrayHelper::map(EstadosVenezuela::find()->all(),'idEstadosVenezuela','descripcionEstados'),
            ['prompt'=>'Seleccione Estado', 'class' =>'form-control',
            'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarmunicipios?id="+$(this).val(), function(data){
                  $( "[name=municipio]" ).html("<option value=\"\">Seleccione Municipio</option>"+data ); 
                  $( "[name=parroquia]" ).html("<option value=\"\">Seleccione Parroquia</option>");     
             });']
            ) ?>
            </div> 
            <div class='col-md-4'>
                <?= Html::dropDownList('municipio',$buscar->municipio,
            ArrayHelper::map(Municipios::find()->where(['idMunicipios'=>$buscar->municipio])->all(),'idMunicipios','nombreMunicipios'),
            ['prompt'=>'Seleccione Municipio', 'class' =>'form-control',
            'onchange'=>'$.post("'.Yii::$app->getUrlManager()->getBaseUrl().'/consejocomunal/listarparroquias?id="+$(this).val(), function(data){
                  $( "[name=parroquia]" ).html("<option value=\"\">Seleccione Parroquia</option>"+data );      
             });']
            ) ?>  
            </div>
            <div class='col-md-4'> 
                <?= Html::dropDownList('parroquia',$buscar->parroquia,
            ArrayHelper::map(Parroquias::find()->where(['idParroquias'=>$buscar->parroquia])->all(),'idParroquias','NombreParroquia'),
            ['prompt'=>'Seleccione Parroquia', 'class' =>'form-control']
            ) ?> 
            </div>
        </div>
    <div class="form-group" style='margin-top:20px'>
        <?= Html::submitButton('buscar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        <div class="row">
            <div class="col-md-12">
                <h1>Consejos Comunales</h1>
            </div>
        </div>
        <?php foreach ($estadosVenezuela as $estado) { $labelEstado = false;
             if(!($estado->idEstadosVenezuela == $buscar->estado || $buscar->estado =='')) continue; ?>
        
        <?php foreach ($estado->municipios as $municipio) { $labelMunicipio = false;
             if(!($municipio->idMunicipios == $buscar->municipio || $buscar->municipio =='')) continue; ?>
        <?php foreach ($municipio->parroquias as $parroquia) { if(count($parroquia->consejocomunals)<=0) break;
             if(!($parroquia->idParroquias == $buscar->parroquia || $buscar->parroquia =='')) continue;
             $existe = false;
             foreach ($parroquia->consejocomunals as $consejo)
             if((strpos($consejo->NombreConsejoComunal, ($buscar->buscar?$buscar->buscar:' ')) !==false  || $buscar->buscar =='')){ $existe = true; break;}
         if(!$existe) break;
              ?>
        <?php if(!$labelEstado){ $labelEstado = true; ?>
        <div class="row">
            <div class="col-md-12">
                <h3><strong>&nbsp;&nbsp;Estado <?php echo $estado->descripcionEstados;?></strong></h3>
            </div>
        </div>
        <?php }?>
        <?php if(!$labelMunicipio){ $labelMunicipio = true; ?>
        <div class="row">
            <div class="col-md-12">
                <h3><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Municipio <?php echo $municipio->nombreMunicipios;?></strong></h3>
            </div>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12">
                <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parroquia <?php echo $parroquia->NombreParroquia;?></h3>
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
/*  $(document).ready(function() {
        $('#tabla').DataTable();
    }*/ 
    );
</script>
