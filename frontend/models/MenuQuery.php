<?php

namespace app\models;

use creocoder\nestedsets\NestedSetsBehavior;
use yii\db\ActiveQuery;

class MenuQuery extends ActiveQuery
{
    public function behaviors()
    {
        return [
            NestedSetsBehavior::className(),
        ];
    }
}
