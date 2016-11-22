<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Municipios */

$this->title = 'Update Municipios: ' . $model->idMunicipios;
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMunicipios, 'url' => ['view', 'id' => $model->idMunicipios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="municipios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
