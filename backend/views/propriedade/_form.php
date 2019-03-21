<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Propriedade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propriedade-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomePt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomeEn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomeFr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ilha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'proposito')->dropDownList([ '0' => 'Arrendar', '1' => 'Vender', ], ['prompt' => 'Proposito da propriedade']) ?>

    <?= $form->field($model, 'quarto')->textInput() ?>

    <?= $form->field($model, 'garragem')->textInput() ?>

    <?= $form->field($model, 'banheiro')->textInput() ?>

    <?= $form->field($model, 'cozinha')->textInput() ?>

    <?= $form->field($model, 'sala')->textInput() ?>

    <?= $form->field($model, 'descricaoPt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descricaoEn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descricaoFr')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
