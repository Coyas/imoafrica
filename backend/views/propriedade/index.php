<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PropriedadeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Propriedades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propriedade-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar Propriedade', ['dono/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomePt',
            'nomeEn',
            'nomeFr',
            'ilha',
            //'zona',
            //'area',
            //'preco',
            //'proposito',
            //'quarto',
            //'garragem',
            //'banheiro',
            //'cozinha',
            //'sala',
            //'descricaoPt:ntext',
            //'descricaoEn:ntext',
            //'descricaoFr:ntext',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
