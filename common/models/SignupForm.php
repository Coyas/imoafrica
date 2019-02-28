<?php
namespace common\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $Nome;
    public $password;
    public $access;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este username já esta em uso.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já esta em uso.'],

//            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['access', 'required'],
            ['access', 'integer'],

            ['Nome', 'required'],
            ['Nome', 'string', 'max' => 100]
        ];
    }

    /**
     * @return string
     * geração de combinações aleatorias para usar nas senhas
     */
    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789#&@(){}[]?-_";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
//            echo "erro na validacao";
//            $errors = $this->errors;
//            print_r($errors);
//            die;
            return null;
        }
        
        $user = new User();
        $user->Nome = $this->Nome;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->access = $this->access;

        Yii::$app->params['senha'] = '@'.$this->username.'&'.$this->randomPassword().date('d-m-Y');
        $user->setPassword(Yii::$app->params['senha']);
//        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save(false) ? $user : null;
    }
}
