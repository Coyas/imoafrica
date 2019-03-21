<?php

namespace backend\controllers;


use Yii;
use app\models\Imagens;
use backend\models\ImagensSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImagensController implements the CRUD actions for Imagens model.
 */
class ImagensController extends Controller
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
     * Lists all Imagens models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagensSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagens model.
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
     * Creates a new Imagens model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Imagens();
//
        if ($model->load(Yii::$app->request->post()) ) {
            if($foto = UploadedFile::getInstance($model, 'foto')) {
                $data2 = date('d-m-Y h:m:s');
                // substituir todos os espacos nos files por _ e concatenar com E"datade hoje"
                $model->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_P'.$data2.'.'.$foto->extension);
                echo $model->foto."<br>";
                $foto->saveAs('upload/imoveis/' . $model->foto);
//                if ($foto->saveAs('upload/imoveis/' . $model->foto)){
//                    echo "savaAs com sucesso".$id."<br>";
//                }else {
//                    echo "savaAs com erro:".$id."<br>";
//                }
                $data2 = date('Y-m-d h:m:s');
                $model->created_at = $data2;
                $model->updated_at = null;
            }
//            die;

            $model->id_propriedade = $id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
//        select nome from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 1;
//        $dados = (new Query())->select('nome')->from('dono')
//            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
//            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
//            ->where(['p.id' => $id])->One();
//        print_r($dados);die;
//        $dono = $dados['nome'].date('h:m:s');
        return $this->render('create', [
            'model' => $model
//            'id' => $id,
//            'dono' => $dono,
        ]);
    }

    public function actionUpload($id)
    {
        $fileName = 'file';
        $uploadPath = 'upload/imoveis';
        $model = new Imagens();

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
//            print_r($file);

//            die;

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database
                $model->foto = $file->name;
                $model->id_propriedade = $id;
                $model->created_at = date('Y-m-d h:m:s');
                $model->save();
                echo \yii\helpers\Json::encode($file);
            }
        }else {
            return $this->render('upload',['id' => $id]);
        }

        return false;
    }

    /**
     * Updates an existing Imagens model.
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
     * Deletes an existing Imagens model.
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
     * Finds the Imagens model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imagens the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagens::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
