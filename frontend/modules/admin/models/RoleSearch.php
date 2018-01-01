<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class RoleSearch extends Role
{
    public function rules()
    {
        return [
            [['name'], 'string']
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($param)
    {
        $query = Role::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($param);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'name' => $this->name,
        ]);

        return $dataProvider;
    }
}
