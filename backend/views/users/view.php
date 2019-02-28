<?php

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

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Desejas mesmo apagar este usuario?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Mudar a senha', ['users/change-password'], ['class' => 'btn btn-primary']) ?>
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
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
