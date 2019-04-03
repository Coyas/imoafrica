<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 3/15/19
 * Time: 10:06 AM
 */

use yii\db\Query;
use yii\helpers\Html;
use yii\web\View;
use yii\helpers\Url;

?>

    <div class="section">
    <div class="meumarginb container-fluid">
        <h1 class="gallery-title">Showroom</h1>
        <div class="row">
            <div class="gallery col-md-6">
                <div class="detalhes-header">
                    <div class="desc-detalhes preco"> <b><?=Yii::t('app', 'Preço')?>:</b> <?= Html::encode($dados['preco'])?> $00</div>
                    <div class="desc-detalhes tipo"> <b><?=Yii::t('app', 'Propósito')?>:</b> <?php if($dados['proposito'] == 1){ echo "Arrendar";}elseif ($dados['proposito'] == 2){ echo "Vender";}?></div>
                    <div class="desc-detalhes area"> <b><?=Yii::t('app', 'Área') ?>: </b> <?= Html::encode($dados['area'])?>m<sup>2</sup></div>
<!--                    <div class="desc-detalhes banheiro"> <b>Banheiros:</b> 2</div>-->
                </div>
                <h2 class="detalhes-title"><b><?= Html::encode($dados['tipo'])?></b><br><?= Html::encode($dados['conselho']. ", ".$dados['zona'])?></h2>

                <h4 class="detalhes-desc"><?=Yii::t('app', 'Descrição')?></h4>
                <p class="detalhes-text">
                    <?= Html::encode($dados['descricaoPt'])?>
                </p>
                <h4 class="detalhes-desc"><?=Yii::t('app', 'Compartimentos')?></h4>
                <div class="detalhes-header">
                    <div class="com-detalhes tooltips">
                        <img src="images/quarto.png" class="icone-detalhes" alt=""> <b><sub><?= Html::encode($dados['quarto'])?></sub></b>
                        <span class="tooltiptext"><?=Yii::t('app', 'Quartos')?></span>
                    </div>
                    <div class="com-detalhes  tooltips">
                        <img src="images/garragem.png" class="icone-detalhes" alt=""> <b> <sub><?= Html::encode($dados['garragem'])?></sub></b>
                        <span class="tooltiptext"><?=Yii::t('app', 'Garagem')?></span>
                    </div>
                    <div class="com-detalhes  tooltips">
                        <img src="images/banheiro.png" class="icone-detalhes" alt=""> <b> <sub><?= Html::encode($dados['banheiro'])?></sub></b>
                        <span class="tooltiptext"><?=Yii::t('app', 'Casa De Banho')?></span>
                    </div>
                    <div class="com-detalhes  tooltips">
                        <img src="images/cozinha.png" class="icone-detalhes" alt=""> <b> <sub><?= Html::encode($dados['cozinha'])?></sub></b>
                        <span class="tooltiptext"><?=Yii::t('app', 'Cozinha')?></span>
                    </div>
                    <div class="com-detalhes  tooltips">
                        <img src="images/sala.png" class="icone-detalhes" alt=""> <b> <sub><?= Html::encode($dados['sala'])?></sub></b>
                        <span class="tooltiptext"><?=Yii::t('app', 'Sala De Estar')?></span></div>
                </div>
            </div>

            <div class="gallery col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="detalhes-galeria">
                    <script src="js/jssorslider.js"></script>
                    <div id="jssor_1" class="detalhes-g-image" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:680px;overflow:hidden;visibility:hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        </div>
                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:580px;overflow:hidden;">

                            <?php foreach ($slides as $slide) {
                                $pasta = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
                                ?>
                                <div>
<!--                                    <img data-u="image" src="img/021.jpg" />-->
                                    <?= Html::img(Url::to(Yii::$app->params['image'].$pasta."/".$slide['foto'], true), ['data-u' => 'image'])?>
                                    <div data-u="thumb">
                                        <a href="<?=Url::to(Yii::$app->params['image'].$pasta."/".$slide['foto'], true)?>" data-lightbox="roadtrip" data-title="Image desc">
<!--                                            <img data-u="thumb" src="img/021-s200x100.jpg" />-->
                                            <?= Html::img(Url::to(Yii::$app->params['image'].$pasta."/".$slide['foto'], true), ['data-u' => 'thumb'])?>
                                        </a>
                                    </div>
                                </div>
                            <?php }?>

                        </div>
                        <!-- Thumbnail Navigator -->
                        <div data-u="thumbnavigator" class="jssort111" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;cursor:default;" data-autocenter="1" data-scale-bottom="0.75">
                            <div data-u="slides">
                                <div data-u="prototype" class="p">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:162px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:162px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                            </svg>
                        </div>
                    </div>
                    <script type="text/javascript">jssor_1_slider_init();</script>
                    <!-- #endregion Jssor Slider End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="section">-->
<!--    <h1 class="gallery-title"> Veja em 360° </h1>-->
<!--</div>-->


<?php
$this->registerJs(
    "$(\"#banner\").show();",
    View::POS_READY,
    'shownave'
);
?>