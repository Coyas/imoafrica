<?php
namespace frontend\controllers;

use common\models\PasswordResetRequestForm;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
//        select p.id, i.foto, p.preco, p.nomePt, p.nomeEn, p.nomeFr from propriedade p left join imagens i on p.id = i.id_propriedade where i.capa = 1 and p.destaque = 1;
//        pegar propriedades
        $destaques = (new Query())
            ->select('p.id, i.foto, p.preco, p.nomePt, p.nomeEn, p.nomeFr')
            ->from('propriedade p')
            ->leftJoin('imagens i', 'p.id = i.id_propriedade')
            ->where(['i.capa' => 1])
            ->Andwhere(['p.destaque' => 1])
            ->orderBy('id')
            ->All();

//        select p.id, i.foto, p.preco, p.ilha, p.zona, p.nomePt from propriedade p left join imagens i on p.id = i.id_propriedade where i.capa = 1;
        $slides = (new Query())
            ->select('p.id, i.foto, p.preco, p.ilha, p.zona, p.nomePt, p.proposito, p.area')
            ->from('propriedade p')
            ->leftJoin('imagens i', 'p.id = i.id_propriedade')
            ->where(['i.capa' => 1])
            ->orderBy('id')
            ->All();


//        print_r($destaques);die;

        return $this->render('index', [
            'destaques' => $destaques,
            'slides' => $slides
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
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
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['supportEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionArrendar()
    {
        //        select p.id, i.foto, p.preco, p.ilha, p.zona, p.nomePt from propriedade p left join imagens i on p.id = i.id_propriedade where i.capa = 1;
        $slides = (new Query())
            ->select('p.id, i.foto, p.preco, p.ilha, p.zona, p.nomePt, p.proposito, p.area')
            ->from('propriedade p')
            ->leftJoin('imagens i', 'p.id = i.id_propriedade')
            ->where(['i.capa' => 1])
            ->andWhere(['like', 'p.proposito', 0])
            ->orderBy('id')
            ->All();
//        print_r($slides);die;

        return $this->render('arrendar', [
            'slides' => $slides
        ]);
    }

    public function actionComprar(){
        //        select p.id, i.foto, p.preco, p.ilha, p.zona, p.nomePt from propriedade p left join imagens i on p.id = i.id_propriedade where i.capa = 1;
        $slides = (new Query())
            ->select('p.id, i.foto, p.preco, p.ilha, p.zona, p.nomePt, p.proposito, p.area')
            ->from('propriedade p')
            ->leftJoin('imagens i', 'p.id = i.id_propriedade')
            ->where(['i.capa' => 1])
            ->andWhere(['like', 'p.proposito', 1])
            ->orderBy('id')
            ->All();
//        print_r($slides);die;

        return $this->render('comprar', [
            'slides' => $slides
        ]);
    }

    public function actionVender(){
        return $this->render('vender');
    }
    public function actionLegalizar(){
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['supportEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('legalizar', [
                'model' => $model,
            ]);
        }
    }
    public function actionJunte(){
        return $this->render('junte');
    }
    public function actionAvaliacao(){
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['supportEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('avaliacao', [
                'model' => $model,
            ]);
        }
    }
    public function actionDetalhes(){
        return $this->render('detalhes');
    }
}
