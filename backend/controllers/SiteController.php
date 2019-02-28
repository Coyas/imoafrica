<?php
namespace backend\controllers;

use app\models\Users;
use backend\models\ChangePasswordForm;
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
                        'actions' => ['login', 'error', 'change-password', 'reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
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
}
