<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BugReport */

$this->title = 'BugTrack#'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bug Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bug-report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--         Html::a('Delete', ['delete', 'id' => $model->id], [-->
<!--            'class' => 'btn btn-danger',-->
<!--            'data' => [-->
<!--                'confirm' => 'Are you sure you want to delete this item?',-->
<!--                'method' => 'post',-->
<!--            ],-->
<!--        ]) ?>-->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'body:html',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
