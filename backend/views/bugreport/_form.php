<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\BugReport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bug-report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo')->dropDownList([
            '0' => 'Reportar Problema',
            '1' => 'Sugerir Alterações',
            '2' => 'Sugerir Novas Funcionalidades',
        ], ['prompt' => 'escolha...']) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#bugreport-body' ),{
            ckfinder: {
                uploadUrl: '/plugins/ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            }
        } )
        .catch( error => {
            console.error( error );
        } );
</script>