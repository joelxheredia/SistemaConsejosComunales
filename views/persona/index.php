<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\personaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cedulaPersona',
            'primerNombre',
            'segundoNombre',
            'primerApellido',
            'segundoApelllido',
            // 'fechaNacimiento',
            // 'edad',
            // 'sexo',
            // 'direccion',
            // 'incapacidad',
            // 'pensionado',
            // 'TipoIdentificacion_idTipoIdentificacion',
            // 'NivelInstruccion_idNivelInstruccion',
            // 'EstadosCiviles_idEstadosCiviles',
            // 'Cargo_idCargo',
            // 'ConsejoComunal_idConsejoComunal',
            // 'Persona_cedulaPersona',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
