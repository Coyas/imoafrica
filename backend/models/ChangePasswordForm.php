<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 28-02-2019
 * Time: 12:38
 */

namespace backend\models;

use yii\base\Model;
use common\models\User;

class ChangePasswordForm extends Model
{
    public $password;
    public $password_repeat;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */


    public function __construct($id, $config = [])
    {
        $this->_user = User::findIdentity($id);

        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'string', 'min' => 6],
            ['password', 'compare', 'compareAttribute' => 'password_repeat', 'message' => 'As senhas são diferentes'],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
//        $user->removePasswordResetToken();

        return $user->save(false);
    }
}