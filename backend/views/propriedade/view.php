<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Propriedade */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Propriedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="propriedade-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Adicionar Imagens', ['imagens/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nomePt',
            'nomeEn',
            'nomeFr',
            'ilha',
            'zona',
            'area',
            'preco',
            'proposito',
            'quarto',
            'garragem',
            'banheiro',
            'cozinha',
            'sala',
            'descricaoPt:ntext',
            'descricaoEn:ntext',
            'descricaoFr:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>




</div>
