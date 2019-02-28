<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 28-02-2019
 * Time: 16:11
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="caxa" class="panel panel-default">
    <div class="panel-heading" style="text-align: center;"><?= Html::encode($this->title) ?></div>
    <div class="panel-body">

    <p>Introduza seu email. Um link para resetar a senha será enviado para o email introduzido.</p>



        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'reCaptcha')->widget(
            ReCaptcha::className(),
            ['siteKey' => '6LdspJQUAAAAAG2IO7rAFIJvKFD4oWDDwd3ONZBx']
        ) ?>

        <div class="form-group">
            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>