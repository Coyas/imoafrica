<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JunteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Juntes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="junte-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Junte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'email:email',
            'assunto',
            'morada',
            //'telefone',
            //'content:ntext',
            //'anexo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
