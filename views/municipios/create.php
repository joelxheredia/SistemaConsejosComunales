<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Municipios */

$this->title = 'Create Municipios';
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
