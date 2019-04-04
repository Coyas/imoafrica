<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipo;
use app\models\Conselho;

/* @var $this yii\web\View */
/* @var $model app\models\Propriedade */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propriedade-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'id_tipo')->textInput() ?>
    <?= $form->field($model, 'id_tipo')->dropDownList(
            \yii\helpers\ArrayHelper::map(Tipo::find()->All(), 'id', 'nome')
    )?>

    <?php // $form->field($model, 'id_conselho')->textInput() ?>
    <?= $form->field($model, 'id_conselho')->dropDownList(
        \yii\helpers\ArrayHelper::map(Conselho::find()->All(), 'id', 'nome')
    )?>

    <?= $form->field($model, 'zona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput() ?>

    <?= $form->field($model, 'proposito')->dropDownList([ 1 => 'Arrendar', 2 => 'Vender', ], ['prompt' => 'Proposito da propriedade']) ?>

    <?= $form->field($model, 'quarto')->textInput() ?>

    <?= $form->field($model, 'garragem')->textInput() ?>

    <?= $form->field($model, 'banheiro')->textInput() ?>

    <?= $form->field($model, 'cozinha')->textInput() ?>

    <?= $form->field($model, 'sala')->textInput() ?>

    <?= $form->field($model, 'descricaopt_PT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descricaoen_US')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descricaofr_FR')->textarea(['rows' => 6]) ?>

    <?= $form->field($imagem, 'foto')->fileInput()->label('Foto De Capa') ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
