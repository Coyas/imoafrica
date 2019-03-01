<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $access = (new Query())->select('access')->from('user')->where(['id' => Yii::$app->user->identity->getId()])->One();
    if ( $access['access'] == 1) { ?>
        <p>
            <?= Html::a('Novo usuario', ['users/signup'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php }?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'username',
            'Nome',
//            'auth_key',
//            'password_hash',
            //'password_reset_token',
            'email:email',
            //'ftlg',
            //'access',
            //'status',
            'created_at',
            //'updated_at',

//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [

                    'view' => function ($url, $model, $key) {
                        return Html::a(' <i class="far fa-eye"></i>', $url);
                        // return $dados['status'] === 10 ?  : '';
                    },

                ]
            ],
        ],
    ]); ?>
</div>
