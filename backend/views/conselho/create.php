<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Conselho */

$this->title = 'Create Conselho';
$this->params['breadcrumbs'][] = ['label' => 'Conselhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conselho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
