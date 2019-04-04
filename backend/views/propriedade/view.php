<?php

use yii\db\Query;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Propriedade */

$this->title = $model->id_tipo;
$this->params['breadcrumbs'][] = ['label' => 'Propriedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="propriedade-view">

    <h1><?= Html::encode($this->title)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; if($model->publicar == 1){ echo "<span class='label-success'>Esta Propriedade Esta Online</span>";}else {echo "<span class='label-warning'>Esta Propriedade Nao Esta Online</span>";} ?></h1>

    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>

                <?php
                    if($model->publicar == 0){
                        echo Html::a('Publicar No Site', ['propriedade/publicar', 'id' => $model->id], ['class' => 'btn btn-success']);
                    }else{
                        echo Html::a('Remover Do Site', ['propriedade/remover', 'id' => $model->id], ['class' => 'btn btn-warning']);
                    }
                ?>

                <?php
                if($model->destaque == 0){
                    echo Html::a('Manter Como Destaque', ['propriedade/destacar', 'id' => $model->id], ['class' => 'btn btn-success']);
                }else{
                    echo Html::a('Remover Do Destaque', ['propriedade/ndestacar', 'id' => $model->id], ['class' => 'btn btn-warning']);
                }
                ?>
            </div>
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
//            'id',
//                        'id_conselho',
//                        'id_tipo',
                        [
                            'label'=>'Propriedade',
                            'format' => 'raw',
                            'value'=>function ($data) {
                                return Html::encode($data->tipo->nome);
                            },
                        ],
                        [
                            'label'=>'Localizaçao',
                            'format' => 'html',
                            'value'=>function ($data) {
                                return $data->conselho->nome;
                            },
                        ],
                        [
                            'label'=>'Proposito',
                            'format' => 'html',
                            'value'=>function ($data) {
                                if ($data->proposito == 1){
                                    return "Arrendar";
                                }elseif ($data->proposito == 2){
                                    return "Vender";
                                }else {
                                    return "";
                                }


                            },
                        ],
//                        'publicar',
                        [
                            'label'=>'Publicar',
                            'format' => 'html',
                            'value'=>function ($data) {
                                if ($data->publicar == 0){
                                    return "Nao";
                                }else {
                                    return "Sim";
                                }


                            },
                        ],
//                        'destaque',
                        [
                            'label'=>'Publicar',
                            'format' => 'html',
                            'value'=>function ($data) {
                                if ($data->destaque == 0){
                                    return "Nao";
                                }else {
                                    return "Sim";
                                }


                            },
                        ],
                        'zona',
                        'area',
                        'preco',
                        'quarto',
                        'garragem',
                        'banheiro',
                        'cozinha',
                        'sala',
                        'descricaopt_PT:ntext',
                        'descricaoen_US:ntext',
                        'descricaofr_FR:ntext',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <?php
        $imagens = (new Query())->select('*')->from('imagens')->where(['id_propriedade' => $model->id])->All();
//        print_r($imagens);die;
//    $pasta2 = $pasta;
        
    ?>


    <div class="container-fluid">
        <h2>Imagens</h2>
        <div class="panel panel-default">
            <div class="panel-heading"> <?= Html::a('Adicionar Imagens', ['imagens/upload', 'id' => $model->id], ['class' => 'btn btn-primary']) ?></div>
            <div class="panel-body">
                <div class="body">
                    <!-- Swiper -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach ($imagens as $imagen){//echo  Url::to(Yii::$app->params['image'].$pasta."/".$imagen['foto'], true);die;?>
                                <div class="swiper-slide"><?=Html::img(Url::to(Yii::$app->params['image'].$pasta."/".$imagen['foto'], true))?></div>
                            <?php } ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>



                </div>
            </div>
        </div>
    </div>





</div>

<?php
 $this->registerJs(
         "    var swiper = new Swiper('.swiper-container', {
              slidesPerView: 3,
              spaceBetween: 30,
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
            });
    ",
         View::POS_LOAD,
         'swipe'
 );
?>