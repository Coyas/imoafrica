<?php

namespace backend\controllers;

use common\models\SignupForm;
use Yii;
use app\models\Users;
use backend\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

//        return $this->redirect(['index']);
        return $this->redirect(['users/index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @return string|\yii\web\Response
     * mudar password dos usuarios do backend se forem os donos da conta
     */

    public function actionChangePassword()
    {
        // set up user and load post
        $user = Yii::$app->user->identity;
        $loadPost = $user->load(Yii::$app->request->post());

        if ($loadPost && $user->validate()) {


            $user->password = trim($user->new_password);
            //save, set flash, and refresh
            $user->save();
            Yii::$app->session->setFlash('success', "Password mudado com sucesso.");
            return $this->redirect(['view', 'id' => $user->id]);
        }

        Return $this->render('changePassword', [
            'user' => $user,
        ]);

    }

    /**
     * @return string|\yii\web\Response
     *
     * criação de usuarios com confirmação de senha pelo email
     */
    public function actionSignup()
    {
        $model = new SignupForm();
//        echo "antes do load<br>";
        if ($model->load(Yii::$app->request->post())) {
//            echo "depois do load antes do signup<br>";
            if ($user = $model->signup()) {
//                echo "depois do signup<br>";
                Yii::$app->session->setFlash('success', "Siga para o email para finalizar o registro.");
                Yii::$app->mailer
                    ->compose(
                        ['html' => 'passwordDefine'],
//                        ['text' => 'passwordDefine-text'],
                        ['user' => $user]
//                        ['ctr' => Yii::$app->params['senha']]
                    )
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' Nova senha foi definida'])
                    ->setTo($user->email)
                    ->setSubject(Yii::$app->name.' Seu password foi definido')
                    ->send();
                return $this->redirect(['users/index']);
            }else {
                echo "nao quer fazer signup<br>";
                die;
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string
     * função para tornar um ususario inativo, isto é, não poder acessar o site
     */
    public function actionActivar($id){



//        $searchModel = new UsersSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $user = Users::findOne($id);
        $user->status = 10;
        $user->save(false);
        Yii::$app->session->setFlash('success', "Usuario activado com sucesso.");

        return $this->redirect(['users/view', 'id' => $id]);
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * esta função fará com que um usuario seja desativado
     */
    public function actionDesativar($id)
    {
        $user = $this->findModel($id);
        $user->status = 0;
        $user->save(false);

//        return $this->goHome();
        return $this->redirect(['users/view', 'id' => $id]);
    }
}
