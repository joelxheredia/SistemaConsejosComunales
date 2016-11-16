<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consejocomunal */

$this->title = 'Create Consejocomunal';
$this->params['breadcrumbs'][] = ['label' => 'Consejocomunals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consejocomunal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
       	'municipios' => $municipios,
       	'usuario'=>$usuario,
    ]) ?>

</div>
