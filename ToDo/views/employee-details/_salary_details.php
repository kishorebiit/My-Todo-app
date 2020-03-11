<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EmployeeSalaryDetails;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeDetails */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Salary Details';

$employeeSalaryDetails = EmployeeSalaryDetails::find()->where(['empId' => $_GET['id']])->all();
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="employee-details-form">
    <?php 
        if($employeeSalaryDetails){
            foreach ($employeeSalaryDetails as $key => $value) {
    ?>
    <div class="row">
        <div class="col-md-5">
            <label>
                Year
            </label>
            <?php echo $value->year; ?>
        </div>
        <div class="col-md-5">
            <label>
                Salary
            </label>
            <?php echo $value->salary; ?>
        </div>
    </div>
    <?php  
        } 
        }else{

    ?>
    <p>No Salary Details</p>
    <?php }?>

</div>

