<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */

$this->title = $model->idConsejoComunal;
$this->params['breadcrumbs'][] = ['label' => 'Consejocomunals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consejocomunal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idConsejoComunal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idConsejoComunal], [
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
            'idConsejoComunal',
            'NombreConsejoComunal',
            'fechaInscripcionConsejoComunal',
            'Parroquias_idParroquias',
        ],
    ]) ?>

</div>
