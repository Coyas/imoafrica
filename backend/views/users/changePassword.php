<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 28-02-2019
 * Time: 12:36
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Defina uma nova senha';
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($user, 'old_password')->passwordInput(['autofocus' => true]) ?>
<?= $form->field($user, 'new_password')->passwordInput() ?>

<?= $form->field($user, 'new_password_repeat')->passwordInput()->label('Repetir password') ?>


<p class="obri">* <small>campos obrigatorios</small></p>

<div class="form-group">
    <div class="col-md-4 col-md-offset-4">
        <?= Html::submitButton('Confirmar', ['class' => 'btn btn-primary btn-block']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
