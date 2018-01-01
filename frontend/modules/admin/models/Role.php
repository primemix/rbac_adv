<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

/**
 * Class Role
 * @package app\modules\admin\models
 * 
 * @property string $name
 */
class Role extends ActiveRecord
{
    public static function tableName()
    {
        return 'auth_item';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Role',
        ];
    }
}
