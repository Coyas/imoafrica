<?php

namespace backend\controllers;

use app\models\DonoPropriedade;
use app\models\Imagens;
use Yii;
use app\models\Propriedade;
use backend\models\PropriedadeSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
//        select nome, apelido from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 4;
        $donoNome = (new Query())->select('nome, apelido')
            ->from('dono')
            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
            ->where(['p.id' => $id])
            ->One();
//        $imagem->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_P'.$data2.'.'.$foto->extension);
        $pasta = str_replace(" ", "_", $donoNome['nome'].$donoNome['apelido']);
//        echo $pasta;
//        die;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'pasta' => $pasta
        ]);
    }

    /**
     * Creates a new Propriedade model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
//        select nome, apelido from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 4;
        $donoNome = (new Query())->select('nome, apelido')
            ->from('dono')
            ->where(['id' => $id])
            ->One();
//        $imagem->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_P'.$data2.'.'.$foto->extension);
        $pasta = str_replace(" ", "_", $donoNome['nome'].$donoNome['apelido']);
//        is_dir(Yii::$app->params['upload'].$pasta);
//        die;
//        print_r($pasta);die;
        $model = new Propriedade();
        $dono_propriedade = new DonoPropriedade();
        $imagem = new Imagens();

        if ($model->load(Yii::$app->request->post()) && $imagem->load(Yii::$app->request->post())) {
            $data = date('Y:m:d h:m:s');
            $model->created_at = $data;
            $model->updated_at = null;
            $model->save();
            $dono_propriedade->id_dono = $id;
            $dono_propriedade->id_propriedade = $model->id;
            $dono_propriedade->created_at = $data;
            $dono_propriedade->updated_at = null;
            $dono_propriedade->save();

            if($foto = UploadedFile::getInstance($imagem, 'foto')) {
                $data2 = date('d-m-Y h:m:s');
                // substituir todos os espacos nos files por _ e concatenar com E"datade hoje"
                $imagem->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_P'.$data2.'.'.$foto->extension);

                if(is_dir(Yii::$app->params['upload'].$pasta)){
                    $foto->saveAs(Yii::$app->params['upload'].$pasta ."/". $imagem->foto);
                }else {
                    if(mkdir (Yii::$app->params['upload'].$pasta, 0777)){
                        $foto->saveAs(Yii::$app->params['upload'].$pasta ."/". $imagem->foto);
                    }else{
                        echo "Nao foi possivel criar a pasta";die;
                    }
                }


                $data2 = date('Y-m-d h:m:s');
                $imagem->capa = 1;
                $imagem->id_propriedade = $model->id;
                $imagem->created_at = $data2;
                $imagem->updated_at = null;
            }else {
                echo "erro ao carregar a imagem";
                echo $imagem->capa;
                die;
            }
            $imagem->save(false);

//            if ($imagem->save(false)){
//                echo "imagem guardado com sucesso";
//
//            }else {
//                echo "Houve um erro ao guardar a imagem";
//                die;
//            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'imagem' => $imagem
        ]);
    }

    /**
     * Updates an existing Propriedade model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)//esse id nao vem do dono como o do create
    {
        //        select nome, apelido from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 4;
        $donoNome = (new Query())->select('nome, apelido')
            ->from('dono')
            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
            ->where(['p.id' => $id])
            ->One();
//        print_r($donoNome);die;
        $pasta = str_replace(" ", "_", $donoNome['nome'].$donoNome['apelido']);

        $model = $this->findModel($id);
        $imagem = Imagens::findOne([
            'capa' => 1,
            'id_propriedade' => $id
        ]);
//        print_r($imagem);die;

//        $dono_propriedade = new DonoPropriedade();

        if ($model->load(Yii::$app->request->post()) && $imagem->load(Yii::$app->request->post())) {
//            select i.id, foto from imagens i left join propriedade p on i.id_propriedade = p.id where p.id = 2 and i.capa = 1;
            $old_foto = (new Query())
                ->select('i.id, foto')
                ->from('imagens i')
                ->leftJoin('propriedade p', 'i.id_propriedade = p.id')
                ->where(['p.id' => $id])
                ->andWhere(['i.capa' => 1])
                ->One();
//            print_r($old_foto);die;
            $data = date('Y:m:d h:m:s');
            $model->updated_at = $data;
            $model->save();

//                get instance of conteudo
            if(file_exists(Yii::$app->params['upload'].$pasta."/".$old_foto['foto']) && $foto = UploadedFile::getInstance($imagem, 'foto')) {

                $imagem->foto = str_replace(" ", "_", substr ($foto->baseName, 0, 10).'_imo-'.$data.'.'.$foto->extension);
                if(!empty($old_foto['foto'])) {
                    unlink(Yii::$app->params['upload'].$pasta."/".$old_foto['foto']);
                }
//                echo "file ".$old_foto['foto']." existe";die;
                $foto->saveAs(Yii::$app->params['upload'].$pasta."/".$imagem->foto);
//                echo "file ".Yii::$app->params['upload'].$pasta."/".$old_foto['foto']." existe";die;
            }else {
                $imagem->foto = $old_foto['foto'];
//                echo "file ".Yii::$app->params['upload'].$pasta."/".$old_foto['foto']." nao existe";die;
            }
            $imagem->updated_at = $data;
            $imagem->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'imagem' => $imagem
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
        //        select nome, apelido from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 4;
        $donoNome = (new Query())->select('nome, apelido')
            ->from('dono')
            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
            ->where(['p.id' => $id])
            ->One();

        $pasta = str_replace(" ", "_", $donoNome['nome'].$donoNome['apelido']);



//        select i.id, foto from imagens i left join propriedade p on i.id_propriedade = p.id where p.id = 1;
        $imagens = (new Query())->select('i.id, foto')
            ->from('imagens i')
            ->leftJoin('propriedade p', 'i.id_propriedade = p.id')
            ->where(['p.id' => $id])
            ->All();
//        print_r($imagens);
//        die;
//        apaga imagens
        foreach ($imagens as $imagem){
            if (file_exists(Yii::$app->params['upload'].$pasta."/" . $imagem['foto'])) {
                if (!empty($imagem['foto'])) {
                    unlink(Yii::$app->params['upload'].$pasta."/" . $imagem['foto']);
//                    echo "remover<br>";
                }
            }
        }

        //        apagar a pasta
        if (is_dir(Yii::$app->params['upload'].$pasta)){
            rmdir(Yii::$app->params['upload'].$pasta);
        }else {
            echo "nao foi possivel apagar esta pasta: ".$pasta;
            die;
        }

//        apagar os dados
        Imagens::deleteAll(['id_propriedade' => $id]);

        DonoPropriedade::deleteAll(['id_propriedade' => $id]);
        $this->findModel($id)->delete();//eliminar a propriedade

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

    public function actionPublicar($id){
        try {
            $model = $this->findModel($id);
        } catch (NotFoundHttpException $e) {
            echo "Houve um errro ao publicar um imovel no site, report isso!";die;
        }
        $model->publicar = 1;
        $model->save();
         return $this->redirect(['propriedade/view', 'id' => $model->id]);
    }

    public function actionRemover($id){
        try {
            $model = $this->findModel($id);
        } catch (NotFoundHttpException $e) {
            echo "Houve um errro ao remover um imovel do site, report isso!";die;
        }
        $model->publicar = 0;
        $model->save();
        return $this->redirect(['propriedade/view', 'id' => $model->id]);
    }

    public function actionDestacar($id){
//        $model = null;
        try {
            $model = $this->findModel($id);
        } catch (NotFoundHttpException $e){
            echo "Houve um errro ao promover este movel para destaque, report isso!";die;
        }
        $model->destaque = 1;
        $model->save();
        return $this->redirect(['propriedade/view', 'id' => $model->id]);
    }

    public function actionNdestacar($id){
//        $model = null;
        try {
            $model = $this->findModel($id);
        } catch (NotFoundHttpException $e){
            echo "Houve um errro ao remover este movel do destaque, report isso!";die;
        }
        $model->destaque = 0;
        $model->save();
        return $this->redirect(['propriedade/view', 'id' => $model->id]);
    }
}
