<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagens */
$this->params['senha'] = " ";
$this->title = 'Update Imagens: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imagens-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
