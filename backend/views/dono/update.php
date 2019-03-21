<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dono */

$this->title = 'Update Dono: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Donos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dono-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
