<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\persona */

$this->title = $model->cedulaPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cedulaPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cedulaPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cedulaPersona',
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApelllido',
            'fechaNacimiento',
            'edad',
            'sexo',
            'direccion',
            'incapacidad',
            'pensionado',
            'TipoIdentificacion_idTipoIdentificacion',
            'NivelInstruccion_idNivelInstruccion',
            'EstadosCiviles_idEstadosCiviles',
            'Cargo_idCargo',
            'ConsejoComunal_idConsejoComunal',
            'Persona_cedulaPersona',
        ],
    ]) ?>

</div>
