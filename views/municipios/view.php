<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Municipios */

$this->title = $model->idMunicipios;
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idMunicipios], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idMunicipios], [
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
            'idMunicipios',
            'nombreMunicipios',
            'Estados_idEstados',
        ],
    ]) ?>

</div>
