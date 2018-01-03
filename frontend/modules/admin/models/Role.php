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
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Role',
        ];
    }
}
