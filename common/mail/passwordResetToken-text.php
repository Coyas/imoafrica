<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>

    Ola <?= $user->username ?>,

    Siga o link abaixo para resetar a senha:

<?= $resetLink ?>