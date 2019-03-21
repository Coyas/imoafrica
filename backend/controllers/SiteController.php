<?php
namespace backend\controllers;

use app\models\Users;
use backend\models\ChangePasswordForm;
use Cloudinary;
use Cloudinary\Uploader;
use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'change-password', 'reset-password', 'request-password-reset', 'upload', 'my_generate_signature'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['request-password-reset'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['my_generate_signature'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity->ftlg === 0){
            $this->redirect(['site/change-password', 'id' => Yii::$app->user->identity->getId()]);
        }else {
            return $this->render('index');
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     *
     * mudar a senha to primeiro login
     */
    public function actionChangePassword($id)
    {
        if (Yii::$app->user->identity->ftlg == 0) {
            $this->layout = 'resetPasswd';
        }
        $user2 = Users::findOne($id);
        if (Yii::$app->user->identity->username === $user2->username) {


            try {
                $model = new ChangePasswordForm($id);
            } catch (InvalidParamException $e) {
                throw new BadRequestHttpException($e->getMessage());
            }

            if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
                Yii::$app->session->setFlash('success', 'Nova senha foi guardada.');

                $user = Users::findOne(Yii::$app->user->identity->getId());
                $user->ftlg = 1;
                $user->save(false);

                return $this->goHome();
            }

            return $this->render('resetPassword', [
                'model' => $model,
            ]);
        }else {
            return $this->render('negado');
        }

//        return $this->goHome();
    }
    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'resetPasswd';

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            $model->reCaptcha;
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Verifica o email e siga as instruções.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Desculpe, não foi possivel seguir para o restauro da senha para o email indicado.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = 'resetPasswd';

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Nova senha guardada.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionUpload(){

        Cloudinary::config(array(
            "cloud_name" => "imoafrica",
            "api_key" => "855424493243825",
            "api_secret" => "2yxRMRhlxO1LQ8xY2n6NO2x7blQ"
        ));

//        $foto = "sys/icon.png";
//
//        $var = Uploader::upload($foto,
//            array(
//            "folder" => "imoveis/vera/",
//            "public_id" => "imoafricaw")
//        );
//
//        if($var){
//            echo "Upload para o cloudnary feito com sucesso";
//            echo $var;
//        }else {
//            echo "deu um erro ao enviar a imagem para o cloudnay";
//            echo $var;
//        }


        return $this->render('upload');
    }
    public function actionMy_generate_signature(){
//        echo
    }
}
