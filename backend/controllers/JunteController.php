<?php

namespace backend\controllers;

use Yii;
use app\models\Junte;
use backend\models\JunteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * JunteController implements the CRUD actions for Junte model.
 */
class JunteController extends Controller
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
     * Lists all Junte models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JunteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Junte model.
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
     * Creates a new Junte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Junte();

        if ($model->load(Yii::$app->request->post())) {

            $model->anexo = UploadedFile::getInstance($model, 'anexo');
            if($model->anexo){
                $time = time();
                $model->anexo->saveAs(Yii::$app->params['anexo'].$time.'.'.$model->anexo->extension);
                $model->anexo = Yii::$app->params['anexo'].$time.'.'.$model->anexo->extension;
            }
            if ($model->anexo){
                $value = Yii::$app->mailer->compose()
                    ->setFrom([Yii::$app->params['supportEmail'] => $model->nome])
                    ->setTo($model->email)
                    ->setSubject($model->assunto)
                    ->setHtmlBody($model->content)
                    ->attach($model->anexo)
                    ->send();
//                print_r($value);
            }else {
                $value = Yii::$app->mailer->compose()
                    ->setFrom([Yii::$app->params['supportEmail'] => $model->nome])
                    ->setTo($model->email)
                    ->setSubject($model->assunto)
                    ->setHtmlBody($model->content)
                    ->send();
//                print_r($value);
            }
//            echo Yii::$app->params['supportEmail']."<br>";
//            echo $model->nome."<br>";
//            echo $model->email."<br>";
//            echo $model->assunto."<br>";
//            echo $model->content."<br>";

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Junte model.
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
     * Deletes an existing Junte model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Junte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Junte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Junte::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
