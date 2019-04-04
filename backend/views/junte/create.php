<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Junte */

$this->title = 'Create Junte';
$this->params['breadcrumbs'][] = ['label' => 'Juntes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="junte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
