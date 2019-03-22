<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Propriedade */
$this->title = 'Update Propriedade: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Propriedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propriedade-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'imagem' => $imagem
    ]) ?>

</div>
