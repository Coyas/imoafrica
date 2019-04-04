<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Conselho */

$this->title = 'Update Conselho: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Conselhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conselho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
