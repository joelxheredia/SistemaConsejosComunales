<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */

$this->title = 'Update Consejocomunal: ' . $model->idConsejoComunal;
$this->params['breadcrumbs'][] = ['label' => 'Consejocomunals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idConsejoComunal, 'url' => ['view', 'id' => $model->idConsejoComunal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consejocomunal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
