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
	    <?= Html::beginForm(['todo/create'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>

    <div class="row">
    	<div class="col-md-12">
    		<label>Name</label>
	    <?= Html::input('text', 'name', Yii::$app->request->post('string'), ['class' => 'form-control', 'placeholder' => 'Name']) ?><br/>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		 <label>Description</label>
	    <?= Html::textArea('description', Yii::$app->request->post('string'), ['class' => 'form-control', 'placeholder' => 'Description']) ?>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		 <label>Due Date</label>

	    <?= Html::input('text', 'duedate', Yii::$app->request->post('string'), ['class' => 'form-control', 'id' => 'dea_expiry', 'placeholder' => 'Y-m-d']) ?>
	    
    	</div>


    </div> 
	    <div class="form-group  text-center">
	    	<?= Html::submitButton('Create', ['class' => 'btn btn-success', 'name' => 'create']) ?>
		</div>
	    <?= Html::endForm() ?>
	    
	<?php Pjax::end(); ?>

</div>
