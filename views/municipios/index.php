<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MunicipiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Municipios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Municipios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMunicipios',
            'nombreMunicipios',
            'Estados_idEstados',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
