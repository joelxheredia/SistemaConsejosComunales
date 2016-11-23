<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\Tipoidentificacion;
use app\models\Nivelinstruccion;
use app\models\Estadosciviles;
use app\models\Cargo;
use app\models\Consejocomunal;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\persona */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedulaPersona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoNombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segundoApelllido')->textInput(['maxlength' => true]) ?>

    <?php 
        echo '<label>Fecha de Nacimiento</label><br>'; 
        echo DatePicker::widget([ 
            'model' => $model,
            'attribute' => 'fechaNacimiento',
            'language' => 'es',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => ['class' => 'form-control']
        ]);
        
        echo "<br>";

        
    ?>

    <?= $form->field($model, 'edad')->textInput() ?>    

    <?php 
    $a=['M'=>'Masculino','F'=>'Femenino'];
    echo $form->field($model,'sexo')->dropDownList($a,['prompt'=>'Seleccione']);
    ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'incapacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pensionado')->textInput(['maxlength' => true]) ?>

    <?php 
        $tiposId = Tipoidentificacion::find()->all();        
        $listData=ArrayHelper::map($tiposId,'idTipoIdentificacion','descripcion');

        echo $form->field($model, 'TipoIdentificacion_idTipoIdentificacion')->dropDownList(
                $listData, ['prompt'=>'Seleccione']);

    ?>

    <?php 
        $nivelInst = Nivelinstruccion::find()->all();        
        $listData=ArrayHelper::map($nivelInst,'idNivelInstruccion','descripcion');

        echo $form->field($model, 'NivelInstruccion_idNivelInstruccion')->dropDownList(
                $listData, ['prompt'=>'Seleccione']);

    ?>    

    <?php 
        $estadosCiv = Estadosciviles::find()->all();        
        $listData=ArrayHelper::map($estadosCiv,'idEstadosCiviles','decripcion');

        echo $form->field($model, 'EstadosCiviles_idEstadosCiviles')->dropDownList(
                $listData, ['prompt'=>'Seleccione']);

    ?>    

    <?php 
        $cargos = Cargo::find()->all();        
        $listData=ArrayHelper::map($cargos,'idCargo','nombreCargo');

        echo $form->field($model, 'Cargo_idCargo')->dropDownList(
                $listData, ['prompt'=>'Seleccione']);

    ?> 
    
    <?php 
        $consejos = Consejocomunal::find()->all();        
        $listData=ArrayHelper::map($consejos,'idConsejoComunal','NombreConsejoComunal');

        echo $form->field($model, 'ConsejoComunal_idConsejoComunal')->dropDownList(
                $listData, ['prompt'=>'Seleccione']);

    ?>     

    <?= $form->field($model, 'Persona_cedulaPersona')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
