<?php

namespace app\models;

use creocoder\nestedsets\NestedSetsBehavior;
use yii\db\ActiveRecord;

/**
 * MultipleTree
 *
 * @property integer $id
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 */
Class Menu extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    public function behaviors()
    {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                // 'treeAttribute' => 'tree',
//                 'leftAttribute' => 'lft',
//                 'rightAttribute' => 'rgt',
//                 'depthAttribute' => 'depth',
            ],
        ];
    }

    public function rules()
    {
        return [
            ['name', 'required'],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
    
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }

    /**
     * https://github.com/creocoder/yii2-nested-sets/tree/master/tests
     * https://github.com/creocoder/yii2-nested-sets
     * https://github.com/yiiext/nested-set-behavior/blob/master/readme_ru.md
     * https://github.com/yiiext/nested-set-behavior
     * https://habrahabr.ru/post/266155/
     */
    public function createMenu()
    {
        Menu::deleteAll();
        
        $array = [
            'name' => 'category',
            'product' => 'product-name',
            'brand' => 'brand-name',
        ];

            $category = new Menu(['name' => $array['name']]);
            $category->makeRoot();

            $product = new Menu(['name' => $array['product']]);
            $product->prependTo($category);

            $brand = new Menu(['name' => $array['brand']]);
            $brand->appendTo($product);
    }
}
