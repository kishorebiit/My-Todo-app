<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeDetails */

$this->title = 'Create Employee Details';
$this->params['breadcrumbs'][] = ['label' => 'Employee Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
