<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Todo */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
	.row{
		margin-bottom: 10px;
	}
</style>


<div class="todo-form">

    <?php $form = Pjax::begin(); ?>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true, 'class' => 'form-inline']]); ?>
	    
    <div class="row">
    	<div class="col-md-12">
    		
	        <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?><br/>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		 
	         <?= $form->field($model, 'description')->textInput(['class' => 'form-control']) ?><br/>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		 
             <?= $form->field($model, 'duedate')->textInput(['class' => 'form-control']) ?>	<br/>
    	</div>


    </div> 
	    <div class="form-group  text-center">
	    	<?= Html::submitButton('Create', ['class' => 'btn btn-success', 'name' => 'create']) ?>
		</div>
	    <!-- <?= Html::endForm() ?> -->
	   <?php ActiveForm::end(); ?>
	<?php Pjax::end(); ?>

</div>
