<?php

namespace app\controllers;

use Yii;
use app\models\EmployeeDetails;
use app\models\EmployeeSalaryDetails;
use app\models\EmployeeDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeDetailsController implements the CRUD actions for EmployeeDetails model.
 */
class EmployeeDetailsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EmployeeDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeDetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EmployeeDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->empId]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Creates a new EmployeeDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSalarydetails()
    {

        return $this->renderAjax('_salary_details');
    }
    /**
     * Creates a new EmployeeDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddexperience()
    {
        $model = new EmployeeSalaryDetails();
        $employeemodel = new EmployeeDetails();

        // $employeemodel->scenario = 'add_experience';
        if ($model->load(Yii::$app->request->post())) {
            // echo "<pre>";print_r($_POST['EmployeeSalaryDetails']);exit;
            $salaryDetails = $_POST['EmployeeSalaryDetails'];
            $employee_id = $_POST['EmployeeDetails']['employe_id'];
            $employee_experience = $_POST['EmployeeDetails']['experience'];

            $updateEmployee = EmployeeDetails::find()->where(['empId' => $employee_id])->one();
            $updateEmployee->experience = $employee_experience;
            $updateEmployee->save(false);

            $i = 0;
            $employeeDetails = EmployeeSalaryDetails::find()->where(['year'=>$_POST['EmployeeSalaryDetails']['year'], 'empId' => $employee_id])->one();
            if(empty($employeeDetails)){
                foreach ($_POST['EmployeeSalaryDetails']['year']  as $value) {
                        $model = new EmployeeSalaryDetails();
                        $year = $salaryDetails['year'][$i];
                        $salary = $salaryDetails['salary'][$i];
                       
                        $model->empId = $employee_id;
                        $model->year = $year;
                        $model->salary = $salary;
                        $model->save();

                        $i = $i + 1;
                }
            }
            return $this->redirect(['index']);
        }
        return $this->renderAjax('_add_experience', [
                'model' => $model,
                'employeemodel' => $employeemodel
        ]);
    }

    public function actionCheckexpericeunquie()
    {
        if (isset($_POST['years'])) {
            $employeeDetails = EmployeeSalaryDetails::find()->where(['year'=>$_POST['years'], 'empId' => $_POST['employe_id']])->one();   
            if(!empty($employeeDetails)){
                if(($employeeDetails)){
                  $status=1;
                }else{
                  $status=2;
                }
            }else{
                $status=2;
            }
            return $status;
        }else{
            return 2;
        }
    }

    /**
     * Updates an existing EmployeeDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->empId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EmployeeDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmployeeDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmployeeDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployeeDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
