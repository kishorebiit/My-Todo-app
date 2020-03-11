<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EmployeeDetails;

/**
 * EmployeeDetailsSearch represents the model behind the search form of `app\models\EmployeeDetails`.
 */
class EmployeeDetailsSearch extends EmployeeDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empId', 'age', 'experience'], 'integer'],
            [['name', 'dob', 'mobileNo', 'designation', 'createdOn'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EmployeeDetails::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'empId' => $this->empId,
            'age' => $this->age,
            'dob' => $this->dob,
            'experience' => $this->experience,
            // 'salary' => $this->salary,
            'createdOn' => $this->createdOn,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mobileNo', $this->mobileNo])
            ->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
}
