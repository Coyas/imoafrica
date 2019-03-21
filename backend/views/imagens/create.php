<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagens */

$this->title = 'Create Imagens';
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
