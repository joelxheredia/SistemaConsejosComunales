<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConsejocomunalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consejocomunal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idConsejoComunal') ?>

    <?= $form->field($model, 'NombreConsejoComunal') ?>

    <?= $form->field($model, 'fechaInscripcionConsejoComunal') ?>

    <?= $form->field($model, 'Parroquias_idParroquias') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
