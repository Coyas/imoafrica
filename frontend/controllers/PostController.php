<?php

namespace frontend\controllers;

use Yii;
use app\models\Post;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($title)
    {
        // get the cookie and session collection (yii\web\CookieCollection) from the "request" component
        $cookies = Yii::$app->request->cookies;
        $session = Yii::$app->session;
        // get the "language" cookie value. If the cookie does not exist, return "pt-PT" as the default value.
        $languageC = $cookies->getValue('language', 'pt-PT');
//        echo 'Do cookie: '.$languageC.'<br>';
        //if($language != 'pt-PT' || $language != 'en-US') $language = 'pt-PT';
        // get a session variable. The following usages are equivalent:
        $languageS = $session->get('language');
//        echo 'Da sessao: '.$languageS;
        $lang = str_replace("-", "_", $languageS);
        $a = -1;
        switch ($lang){
            case 'pt_PT':$a = 0;break;
            case 'en_US':$a = 1;break;
            case 'fr_FR':$a = 2;break;
            default: $a = 0;
        }

//        echo $a;die;

        $model = (new Query())
            ->select('*')
            ->from('post')
            ->where([
                'slug' => $title,
                'lang' => $a
            ])
            ->All();

//        print_r($model);

        return $this->render('view', [
            'model' => $model
        ]);
    }


}
