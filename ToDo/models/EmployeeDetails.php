<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employeeDetails".
 *
 * @property int $empId
 * @property string $name
 * @property int $age
 * @property string $dob
 * @property string $mobileNo
 * @property string $designation
 * @property int $experience
 * @property float $salary
 * @property string $createdOn
 */
class EmployeeDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employeeDetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age', 'dob', 'mobileNo', 'designation', 'experience', 'salary'], 'required'],
            [['age', 'experience'], 'integer'],
            [['dob', 'createdOn'], 'safe'],
            [['salary'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['mobileNo'], 'string', 'max' => 10],
            [['designation'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'empId' => 'Emp ID',
            'name' => 'Name',
            'age' => 'Age',
            'dob' => 'Dob',
            'mobileNo' => 'Mobile No',
            'designation' => 'Designation',
            'experience' => 'Experience',
            'salary' => 'Salary',
            'createdOn' => 'Created On',
        ];
    }
}
