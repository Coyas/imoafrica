<?php

namespace backend\controllers;

use app\models\DonoPropriedade;
use app\models\Imagens;
use app\models\Propriedade;
use yii\db\Query;
use Yii;
use app\models\Dono;
use backend\models\DonoSearch;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonoController implements the CRUD actions for Dono model.
 */
class DonoController extends Controller
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
     * Lists all Dono models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dono model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
//        select id, nomePt from propriedade left join dono_propriedade dp on propriedade.id = dp.id_propriedade where dp.id_dono = 1;
        $query = Propriedade::find()
            ->leftJoin('dono_propriedade dp', 'propriedade.id = dp.id_propriedade')
            ->where(['dp.id_dono' => $id]);
//        print_r($query);
//        die;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 10,
            ],
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Dono model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dono();

        if ($model->load(Yii::$app->request->post()) ) {
            $data = date('Y:m:d h:m:s');
            $model->created_at = $data;
            $model->updated_at = null;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dono model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $data = date('Y:m:d h:m:s');
            $model->updated_at = $data;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Dono model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $dono = $this->findModel($id);
//        select dono.id as dono, p.id as propriedade from dono left join dono_propriedade dp on dono.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where dono.id = 1;
//       pegar todos os propriedades desse dono
        $id_propriedades = (new Query())->select('p.id')
            ->from('dono')
            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
            ->where(['dono.id' => $id])
            ->All();
//        print_r($id_propriedades);die;


//        Pegar a lista de todas as imagens desse dono
//        select DISTINCT i.id, i.foto from imagens i left join propriedade p on i.id_propriedade = p.id left join dono_propriedade dp on p.id = 1 left join dono d on dp.id_dono = d.id where d.id = 1;
        $imagens = (new Query())
            ->select('i.id, i.foto')
            ->from('imagens i')
            ->leftJoin('propriedade p', 'i.id_propriedade = p.id')
            ->leftJoin('dono_propriedade dp', 'p.id = dp.id_propriedade')
            ->leftJoin('dono d', 'dp.id_dono = d.id')
            ->where(['d.id' => $id])
            ->All();

//        print_r($imagens);die;
//        gerar o nome da pasta
        $pasta = str_replace(" ", "_", $dono->nome.$dono->apelido);
//        echo $pasta;die;
//        apagar todas as imagens do servidor
            foreach ($imagens as $imagem){
                echo $imagem['id'].": ".$imagem['foto']."<br>";
                if (file_exists(Yii::$app->params['upload'].$pasta."/" . $imagem['foto'])) {
//                    echo Yii::$app->params['upload'].$pasta."/" . $imagem['foto'];die;
                    if (!empty($imagem['foto'])) {

                        if (unlink(Yii::$app->params['upload'].$pasta."/" . $imagem['foto'])){
//                            echo "remover<br>";
                        }else {
                            echo "erro ao remover imagem";
                        }
//                    echo "remover<br>";
                    }else {
                        echo "erro ao remover imagem";
                    }
                }
            }
//            die;
//        $propriedades = (new Query())->select('p.id')
//            ->from('dono')
//            ->leftJoin('dono_propriedade dp', 'dono.id = dp.id_dono')
//            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
//            ->where(['dono.id' => $id])
//            ->All();
//        echo $pasta;die;
//        apagar pasta do dono do servidor
        if (is_dir(Yii::$app->params['upload'].$pasta)){
//            echo "pasta existe";die;
            rmdir(Yii::$app->params['upload'].$pasta);
        }else {
//            echo "pasta nao existe: ".$pasta;
//            die;
        }

        //        apagar o elo entre dono e propriedade
        $ok = Propriedade::findOne($id);

        if($ok){
            DonoPropriedade::deleteAll(['id_dono' => $id]);
//        eliminar imagens do banco de dados
            foreach ($id_propriedades as $id_propriedade) {
                Imagens::deleteAll(['id_propriedade' => $id_propriedade['id']]);
            }
//        eliminar propriedades
            foreach ($id_propriedades as $id_propriedade){
//            echo $id_propriedade['id'];
                Propriedade::findOne($id_propriedade['id'])->delete();
            }
        }
//        eliminar o dono
        try {
            $dono->delete();
        } catch (StaleObjectException $e) {
        } catch (\Throwable $e) {
        }//eliminar o dono

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dono model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dono the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dono::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
