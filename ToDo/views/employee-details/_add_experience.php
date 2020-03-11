<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EmployeeSalaryDetails;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeeDetails */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create Experience Details';

$employeeSalaryDetails = EmployeeSalaryDetails::find()->where(['empId' => $_GET['id']])->all();
?>
<script>
    function chcekUnique(){
        var inputs = $(".year");
        var arr_year = [];
        for(var i = 0; i < inputs.length; i++){
            arr_year.push($(inputs[i]).val());
        }

        var employe_id = "<?php echo $_GET['id']; ?>";
        console.log(arr_year, 'arra');
        $.ajax({
        type: "post",
        dataType: 'json',
        url: "index.php?r=employee-details/checkexpericeunquie",
        data: {years : arr_year, employe_id :employe_id},
        async:false,
        success: function(data) {
                console.log(data);   
                if(data == 1){
                    alert('Sorry! Year should be unique');
                    return false;
                }  else{
                    return true;
                }              
            }
        });
        // console.log(arr, 'arr');
    }
    $('#employeedetails-experience').keyup(function(){
        $('#newdata').html('');
        var button = $('#employeedetails-experience'),
        row = $('#mans').clone();
        var experience = $('.experience').val();
        var maxField = $('#employeedetails-experience').val();
        var i;
        if(maxField>=1){
            $('.certificate').show();
        }else{
            $('.certificate').hide();
        }
        if(maxField > 1){ 
            for (i = 1; i < maxField; i++) { 
                row = $('#mans').clone();
                $('#newdata').append(row);
            }
        }
             
    });
    
</script>
<h1><?= Html::encode($this->title) ?></h1>

<div class="employee-details-form">
    <?php $form = ActiveForm::begin(); ?>
    <?php echo HTml::activeHiddenInput($employeemodel, 'employe_id', ['value' => $_GET['id']]); ?>
    <div class="box-body certificateRow" id="certificateMsg">
      
      <div class="certificate"  id="mans" style="display: none;">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <?= $form->field($model, 'year[]')->textInput(['class' => 'form-control year', 'maxLength' => true, 'placeholder' => 'Certificate Name']) ?>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-5">
            <div class="form-group">
              <?= $form->field($model, 'salary[]')->textInput(['class' => 'form-control', 'maxLength' => true, 'placeholder' => 'Certificate Name']) ?>
            </div>
          </div>
          
          
          <!-- /.row --> 
        </div>
      </div> 
      <div id="newdata">
              
          </div>       
    </div>
    <?= $form->field($employeemodel, 'experience')->textInput(['maxlength' => true, 'class' => 'form-control experience']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'onclick' => 'chcekUnique()']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>

