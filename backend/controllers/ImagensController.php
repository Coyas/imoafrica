<?php

namespace backend\controllers;


use Yii;
use app\models\Imagens;
use backend\models\ImagensSearch;
use yii\db\Query;
use yii\db\StaleObjectException;
use yii\helpers\Url;
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
//    public function actionCreate($id)
//    {
//        $model = new Imagens();
////
//        if ($model->load(Yii::$app->request->post()) ) {
//            if($foto = UploadedFile::getInstance($model, 'foto')) {
//                $data2 = date('d-m-Y h:m:s');
//                // substituir todos os espacos nos files por _ e concatenar com E"datade hoje"
//                $model->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_P'.$data2.'.'.$foto->extension);
//                echo $model->foto;
//                $foto->saveAs('upload/imoveis/' . $model->foto);
////                if ($foto->saveAs('upload/imoveis/' . $model->foto)){
////                    echo "savaAs com sucesso".$id."<br>";
////                }else {
////                    echo "savaAs com erro:".$id."<br>";
////                }
//                $data2 = date('Y-m-d h:m:s');
//                $model->created_at = $data2;
//                $model->updated_at = null;
//            }
////            die;
//
//            $model->id_propriedade = $id;
//            $model->save();
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
////        select nome from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 1;
////        $dados = (new Query())->select('nome')->from('dono')
////            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
////            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
////            ->where(['p.id' => $id])->One();
////        print_r($dados);die;
////        $dono = $dados['nome'].date('h:m:s');
//        return $this->render('create', [
//            'model' => $model
////            'id' => $id,
////            'dono' => $dono,
//        ]);
//    }

    public function actionUpload($id)
    {
        $donoNome = (new Query())->select('nome, apelido')
            ->from('dono')
            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
            ->where(['p.id' => $id])
            ->One();
        $pasta = str_replace(" ", "_", $donoNome['nome'].$donoNome['apelido']);
//        echo $pasta;die;
//        $fileName = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_imo-'.$data.'.'.$foto->extension)
        $fileName = 'file';
//        echo Yii::$app->params['upload'].$pasta."<br>";
//        echo Url::to(Yii::$app->params['upload'], true).$pasta;die;
        $uploadPath = Url::to(Yii::$app->params['upload']).$pasta;
//        echo Url::to("imoafrica/backend/web/".Yii::$app->params['upload'], true).$pasta."<br>";
//        echo Yii::$app->params['upload'].$pasta;die;
        $uploadPath = Yii::$app->params['upload'].$pasta;
        $model = new Imagens();
        $txt = null;

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
//            print_r($file);

            if ($file->saveAs($uploadPath . '/' . str_replace(" ", "_", $file->name = substr ($file->baseName, 0, 10).'_imo-'.$this->randomPassword().'.'.$file->extension))) {
//                $data = date('d-m-Y h:m:s');
//                $file->name = str_replace(" ", "_", substr ($file->baseName, 0, 10).'_imo-'.$data.'.'.$file->extension);

                //Now save file data to database
                echo "ficheiro foi guardado";
                $model->foto = $file->name;
                $model->id_propriedade = $id;
                $model->created_at = date('Y-m-d h:m:s');
                $model->save();
                echo \yii\helpers\Json::encode($file);
            }else {
               echo "erro na gravacao de ficheiro";
            }
        }else {
//            $txt = "isset falhou";
            return $this->render('upload',['id' => $id, 'txt' => $txt]);
        }

        return false;
    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789-_";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 15; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
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

//        pagar o nome do dono
//        select d.nome, d.apelido from dono d left join dono_propriedade dp on d.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id left join imagens i on p.id = i.id_propriedade where i.id = 11;
        $dono = (new Query())
            ->select('d.nome, d.apelido')
            ->from('dono d')
            ->leftJoin('dono_propriedade dp' , 'd.id = dp.id_dono')
            ->leftJoin('propriedade p' , 'dp.id_propriedade = p.id')
            ->leftJoin('imagens i' , 'p.id = i.id_propriedade')
            ->where(['i.id' => $id])
            ->One();
        $pasta = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
//        print_r($dono);die;
//        print_r($pasta);die;

        if ($model->load(Yii::$app->request->post()) ) {
            $data = date('Y:m:d h:m:s');
//            pegar a imagem antiga
            $old_foto = (new Query())
                ->select('id, foto')
                ->from('imagens')
                ->One();
            if(file_exists(Yii::$app->params['upload'].$pasta."/".$old_foto['foto']) && $foto = UploadedFile::getInstance($model, 'foto')){
                $model->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_imo-'.$data.'.'.$foto->extension);
                if(!empty($old_foto['foto'])) {
                    unlink(Yii::$app->params['upload'].$pasta."/".$old_foto['foto']);
                    echo "foi unlinked";
                }
//                echo "file ".$old_foto['foto']." existe";die;
                $foto->saveAs(Yii::$app->params['upload'].$pasta."/".$model->foto);
//                echo "file ".Yii::$app->params['upload'].$pasta."/".$old_foto['foto']." existe";die;
            }else {
                $model->foto = $old_foto['foto'];
//                unlink(Yii::$app->params['upload'].$pasta."/".$old_foto['foto']);
//                echo "file ".Yii::$app->params['upload'].$pasta."/".$old_foto['foto']." nao existe";
            }

            $model->updated_at = $data;
//            die;
            $model->save();
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

//        select nome, apelido from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id left join imagens i on p.id = i.id_propriedade where i.id = 1;
        $imagem = Imagens::findOne($id);

            if (file_exists(Yii::$app->params['upload']."/" . $imagem['foto'])) {
                if (!empty($imagem['foto'])) {
                    unlink(Yii::$app->params['upload']."/" . $imagem['foto']);
//                    echo "remover<br>";
                }
            }

        try {
            $imagem->delete();
        } catch (StaleObjectException $e) {
            echo "erro na eliminacao da imagem: StaleObjectException";
            die;
        } catch (\Throwable $e) {
                echo "erro na eliminacao da imagem: Throwable";
                die;
        }

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
