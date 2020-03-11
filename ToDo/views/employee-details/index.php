<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Details';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs("$(function() {
   $('.popupModal').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-content')
     .load($(this).attr('href'));
   });

   $('.salary').click(function(e) {
     e.preventDefault();
     $('#modal').modal('show').find('.modal-content')
     .load($(this).attr('href'));
   });
});");

?>
<div class="employee-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
        yii\bootstrap\Modal::begin(['id' =>'modal']);
        yii\bootstrap\Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'empId',
            'name',
            'age',
            'dob',
            'mobileNo',
            'designation',
            'experience',
            [
              'label' => 'Salary',
              'format' => 'raw',
               'headerOptions'=>['style'=>'max-width: 2150px;width: 150px'],   
               'value'=> function($data)
                { 
                     return  Html::a(Yii::t('app', ' {modelClass}', [
                            'modelClass' => 'Salary Details',
                            ]), ['employee-details/salarydetails','id'=>$data->empId], ['class' => 'btn btn-success salary']);      
                },
            ],

            // 'salary',
            //'createdOn',

            [
                'label' => 'Action',
                'format' => 'raw',
                 'headerOptions'=>['style'=>'max-width: 2150px;width: 150px'],   
                 'value'=> function($data)
                  { 
                       return  Html::a(Yii::t('app', ' {modelClass}', [
                              'modelClass' => 'Details',
                              ]), ['employee-details/addexperience','id'=>$data->empId], ['class' => 'btn btn-success popupModal']);      
                  },
            ],
        ],
    ]); ?>


</div>
