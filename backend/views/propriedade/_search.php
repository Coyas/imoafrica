<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PropriedadeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propriedade-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomePt') ?>

    <?= $form->field($model, 'nomeEn') ?>

    <?= $form->field($model, 'nomeFr') ?>

    <?= $form->field($model, 'ilha') ?>

    <?php // echo $form->field($model, 'zona') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'preco') ?>

    <?php // echo $form->field($model, 'proposito') ?>

    <?php // echo $form->field($model, 'quarto') ?>

    <?php // echo $form->field($model, 'garragem') ?>

    <?php // echo $form->field($model, 'banheiro') ?>

    <?php // echo $form->field($model, 'cozinha') ?>

    <?php // echo $form->field($model, 'sala') ?>

    <?php // echo $form->field($model, 'descricaoPt') ?>

    <?php // echo $form->field($model, 'descricaoEn') ?>

    <?php // echo $form->field($model, 'descricaoFr') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
