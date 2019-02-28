<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 28-02-2019
 * Time: 15:14
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="caxa" class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">Restauro da senha</div>
    <div class="panel-body">

        <h2>Defina sua nova senha:</h2>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput()->label('Repetir password') ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
