<?php

namespace backend\controllers;

use app\models\DonoPropriedade;
use Yii;
use app\models\Propriedade;
use backend\models\PropriedadeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PropriedadeController implements the CRUD actions for Propriedade model.
 */
class PropriedadeController extends Controller
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
     * Lists all Propriedade models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropriedadeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Propriedade model.
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
     * Creates a new Propriedade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Propriedade();
        $dono_propriedade = new DonoPropriedade();

        if ($model->load(Yii::$app->request->post())) {
            $data = date('Y:m:d h:m:s');
            $model->created_at = $data;
            $model->updated_at = null;
            $model->save();
            $dono_propriedade->id_dono = $id;
            $dono_propriedade->id_propriedade = $model->id;
            $dono_propriedade->created_at = $data;
            $dono_propriedade->updated_at = null;
            $dono_propriedade->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Propriedade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//        $dono_propriedade = new DonoPropriedade();

        if ($model->load(Yii::$app->request->post()) ) {
            $data = date('Y:m:d h:m:s');
            $model->updated_at = $data;
            $model->save();
//            $dono_propriedade->id_dono = $id;
//            $dono_propriedade->id_propriedade = $model->id;
//            $dono_propriedade->updated_at = $data;
//            $dono_propriedade->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Propriedade model.
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
     * Finds the Propriedade model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Propriedade the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Propriedade::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
