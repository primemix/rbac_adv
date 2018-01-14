<?php

namespace frontend\controllers;

use app\models\Post;
use yii\web\Controller;

class PostController extends Controller
{
    public function actionIndex()
    {
        $model = Post::find()->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }
}
