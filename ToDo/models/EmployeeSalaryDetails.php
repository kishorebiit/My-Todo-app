<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employeeSalaryDetails".
 *
 * @property int $empsalId
 * @property string $empId CONSTRAINT REFERENCES employeeDetails(empId)
 * @property int $year
 * @property float $salary
 * @property string $createdOn
 */
class EmployeeSalaryDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employeeSalaryDetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'salary'], 'required'],
            [['year'], 'integer'],
            [['salary'], 'number'],
            [['createdOn'], 'safe'],
            [['empId'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empsalId' => 'Empsal ID',
            'empId' => 'Emp ID',
            'year' => 'Year',
            'salary' => 'Salary',
            'createdOn' => 'Created On',
        ];
    }
}
