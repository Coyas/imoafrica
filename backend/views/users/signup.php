<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 28-02-2019
 * Time: 12:55
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registre novo Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'access')->dropDownList(
    [
        0 => 'Gestor',
        1 => 'Administrador',
    ]
); ?>

<!--         $form->field($model, 'password')->passwordInput() -->

<div class="form-group">
    <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>
