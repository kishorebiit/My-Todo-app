<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'empId') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'dob') ?>

    <?= $form->field($model, 'mobileNo') ?>

    <?php // echo $form->field($model, 'designation') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'salary') ?>

    <?php // echo $form->field($model, 'createdOn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
