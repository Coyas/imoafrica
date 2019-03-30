<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Dono */

$this->title = $model->nome." ".$model->apelido;
$this->params['breadcrumbs'][] = ['label' => 'Donos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dono-view">

    <div class="container-fluid">
        <h2><?= Html::encode($this->title) ?></h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Ao apagar um dono tambem apaga as suas propriedades e as respetivas imagens, desejas continuar?',
                        'method' => 'post',
                    ],
                ]) ?>

            </div>
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//                        'id',
                        'nome',
                        'apelido',
                        'contato',
                        'endereco',
                        'email:email',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <h2>Suas Propriedades</h2>
        <div class="panel panel-default">
            <div class="panel-heading"><?= Html::a('adicionar propriedade', ['propriedade/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?></div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//            'id',
                        [
                            'label'=>'Propriedade',
                            'format' => 'raw',
                            'value'=>function ($data) {
                                return Html::a(Html::encode($data->tipo->nome), ['propriedade/view', 'id' => $data->id]);
                            },
                        ],
                        'area',
//                        'id_conselho',
                        [
                            'label'=>'Localizaçao',
                            'format' => 'html',
                            'value'=>function ($data) {
                                return $data->conselho->nome;
                            },
                        ],
//            'zona',
                        'preco',
//                        'proposito',
                        [
                            'label'=>'Proposito',
                            'format' => 'html',
                            'value'=>function ($data) {
                                    if ($data->proposito == 1){
                                        return "Arrendar";
                                    }elseif ($data->proposito == 2){
                                        return "Vender";
                                    }else {
                                        return "";
                                    }


                            },
                        ],
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

//                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>

</div>
