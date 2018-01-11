<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Role;
use app\modules\admin\models\RoleSearch;
use Yii;
use yii\web\Controller;

/**
 * Class RbacController
 * @package app\modules\admin\controllers
 */
class RbacController extends Controller
{
    /**
     * @return string
     */
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

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Role();
        if ($model->load(Yii::$app->request->post())) {
            $auth = Yii::$app->authManager;
            $admin = $auth->createRole(Yii::$app->request->post('Role')['name']);
            $auth->add($admin);
            return $this->redirect(['/admin/rbac']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $auth = Yii::$app->authManager;
        $item = $auth->getRole($id);
        $item = $item ? : $auth->getPermission($id);
        $auth->remove($item);
        return $this->redirect(['/admin/rbac']);
    }
}
