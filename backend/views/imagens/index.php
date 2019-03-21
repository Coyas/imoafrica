<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImagensSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['senha'] = "MalucoInnovat87??";
$this->title = 'Imagens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagens-index">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<?php // Html::a('Create Imagens', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
//    GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'link:ntext',
//            'id_propriedade',
//            'created_at',
//            'updated_at',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]);
?>
    <script src="https://media-library.cloudinary.com/global/all.js"></script>
    <div id="slides" class="cms-container"></div>
    <?php
        $this->registerJs(
                "
                      
                      window.ml = cloudinary.openMediaLibrary({
                          cloud_name: 'imoafrica',
                            api_key: '855424493243825',
                            username: 'suporte@imoafrica.com',
//                            timestamp: '1234567890',
//                            signature: 'abcdefgh',
                          inline_container: '.cms-container',
                          multiple: true,
                          max_files: 8,
                          }, {
                               insertHandler: function (data) {
                                 data.assets.forEach(asset => { console.log(\"Inserted asset:\", 
                                   JSON.stringify(asset, null, 2)) })
                               }
                             }
                          )
                ",
            View::POS_READY,
            'upload'
        );
    ?>


</div>
