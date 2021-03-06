<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $roles app\modules\admin\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="admin-default-index">
    <p>
        <?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $roles,
        'options' => ['style'=>'width: normal;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'raw',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
]);
?>
    </p>

</div>
