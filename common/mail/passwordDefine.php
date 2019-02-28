<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 28-02-2019
 * Time: 14:46
 */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);

use yii\helpers\Html; ?>
<div class="password-def">
    <h4>ImoAfrica Real Estate</h4>
    <p>
        Por Razões de segurança, todos os usuários que tiveram permição de acessar o portal da <?=Html::a('ImoAfrica Real Estate', 'https://imoafrica.com')?>,
        serão enviados um email de confirmação com a sua respetiva senha auto-gerada. Depois do login o usuario será encaminhado para uma pagina para mudar a sua senha.
        Use senhas fortes para dificultar o acesso não autorizado ao portal com as suas credençiais.
        As suas credençiais são privadas e não podem ser compartilhadas com terceiros, deve as manter em um lugar seguro.
        (O lugar mais seguros que aconselhamos é na cabeça)
    </p>
    <p>Usuario: <?=  Html::encode($user->username) ?></p>
    <p>Email: <?=  Html::encode($user->email) ?></p>
    <p>senha: <?= Yii::$app->params['senha'] ?></p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

    <p>&copy; ImoAfrica Real Estate <?= date('Y')?></p>
</div>
