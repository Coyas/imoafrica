<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->Nome;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php
    $access = (new Query())->select('access')->from('user')->where(['id' => Yii::$app->user->identity->getId()])->One();
    $apagar = (new Query())->select('status')->from('user')->where(['id' => $model->id])->One();
    ?>
    <p>
<!--        se estas desativo e eś admin podes ativar ou apagar esta conta-->
        <?php if ($model->status == 0 && $access['access'] == 1) { ?>
            <?= Html::a('Activar', ['activar', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Queres mesmo apagar esta conta?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>

<!--        se és admin, estas ativo e não eś o dono da sessão podes desativar esta conta-->
        <?php if($access['access'] == 1 && $apagar['status'] == 10 && Yii::$app->user->identity->username != $model->username){?>
            <?= Html::a('Desativar', ['desativar', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Queres mesmo desativar esta conta?',
                    'method' => 'post',
                ],
            ]);} ?>

<!--        se és o dono ca sessão podes atualizar e mudar a senha deste usuario-->
        <?php if (Yii::$app->user->identity->username === $model->username) { ?>
            <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

            <?= Html::a('Mudar a senha', ['users/change-password'], ['class' => 'btn btn-primary']) ?>
        <?php }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'username',
            'Nome',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'ftlg',
            'access',
//            'status',
            [
                'attribute' => 'Estado',
                'value' => function($data){
                    if($data->status == 10){
                        return "Activo";
                    }else {
                        return "Inactivo";
                    }
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
