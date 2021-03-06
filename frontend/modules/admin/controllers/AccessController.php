<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\RoleSearch;
use Yii;
use yii\web\Controller;

/**
 * Class AccessController
 * @package app\modules\admin\controllers
 */
class AccessController extends Controller
{
    public function actionIndex()
    {
        $roles = new RoleSearch();
        $dataProvider = $roles->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
            'roles' => $roles,
            'dataProvider' => $dataProvider,
        ]);
    }
}
