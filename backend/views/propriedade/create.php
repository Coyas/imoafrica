<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Propriedade */
$this->params['senha'] = " ";
$this->title = 'Create Propriedade';
$this->params['breadcrumbs'][] = ['label' => 'Propriedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propriedade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
