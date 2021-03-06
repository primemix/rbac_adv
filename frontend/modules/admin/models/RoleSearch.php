<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class RoleSearch
 * @package app\modules\admin\models
 */
class RoleSearch extends Role
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'string']
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $param
     * @return ActiveDataProvider
     */
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
