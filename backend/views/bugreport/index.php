<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\bugReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bug Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bug-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Reportar', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'autor',
//            'tipo',
            [
                'attribute' => 'Tipo',
                'value' => function($data){
                    if($data->tipo == 0){
                        return "Problema";
                    }else if($data->tipo == 1) {
                        return "Alteração";
                    }else if($data->tipo == 2) {
                        return "Nova Funcionalidade";
                    }else {
                        return "-------";
                    }
                }
            ],
//            'visto',
            [
                'attribute' => 'Estado',
                'value' => function($data){
                    if($data->visto == 1){
                        return "Visto";
                    }else {
                        return "Em Analise";
                    }
                }
            ],
//            'body:ntext',
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
