<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
<!--        <a href=""><b> Html::encode($this->title) ?></b></a>-->
        <img src="fav.svg" width="100" height="100">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><b>Faça login para iniciar a seccao</b></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="form-group has-feedback">
<!--                <input type="email" class="form-control" placeholder="Email">-->
                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label(false) ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

            </div>
            <div class="form-group has-feedback">
<!--                <input type="password" class="form-control" placeholder="Password">-->
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
<!--                            <input type="checkbox"> Remember Me-->
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
<!--                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>
        <?php ActiveForm::end(); ?>


        <!-- /.social-auth-links -->

        <a href="#">Esqueceu a senha?</a>
    </div>
    <!-- /.login-box-body -->
</div>