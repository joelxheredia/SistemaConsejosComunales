<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Solicitudes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Persona_cedulaPersona',
            'fechaRealizacion',
            'TipoSolicitud_idTipoSolicitud',
            'codReferecia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
