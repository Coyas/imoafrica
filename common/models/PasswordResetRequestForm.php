<?php
namespace common\models;

use Yii;
use yii\base\Model;
use \himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $reCaptcha;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'Este email não parece estar correto.'],
            [['reCaptcha'], ReCaptchaValidator::className(), 'secret' => '6LdspJQUAAAAALc6DOO96ggEaerhMUbQGM-U6wI5', 'uncheckedMessage' => 'Por favor confirme que não és um robo'],

        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save(false)) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name ])
            ->setTo($this->email)
            ->setSubject('Restauro da senha para ' . Yii::$app->name)
            ->send();
    }
}
