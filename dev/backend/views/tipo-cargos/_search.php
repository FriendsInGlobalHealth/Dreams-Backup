<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TipoCargosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-cargos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'subordinado_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'from_date') ?>

    <?= $form->field($model, 'to_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'criado_por') ?>

    <?php // echo $form->field($model, 'actualizado_por') ?>

    <?php // echo $form->field($model, 'criado_em') ?>

    <?php // echo $form->field($model, 'actualizado_em') ?>

    <?php // echo $form->field($model, 'user_location') ?>

    <?php // echo $form->field($model, 'user_location2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
