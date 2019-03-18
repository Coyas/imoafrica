<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 3/15/19
 * Time: 10:06 AM
 */

?>


<div class="meumarginb container">
    <h1 class="gallery-title">Showroom</h1>
    <div class="row">
        <div class="gallery col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="detalhes-header">
                <div class="desc-detalhes preco"> <b>Preço:</b> 200.000</div>
                <div class="desc-detalhes tipo"> <b>Tipo:</b> Arrendar</div>
                <div class="desc-detalhes area"> <b>Area: </b> 0000M</div>
                <div class="desc-detalhes banheiro"> <b>Banheiros:</b> 2</div>
            </div>
            <h2 class="detalhes-title">Nome do localização da Propriedade</h2>
            <h4 class="detalhes-desc">Descrisão</h4>
            <p class="detalhes-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae dictum eros.
                Quisque semper vel purus eget auctor. Pellentesque ut aliquam ante, in lobortis mauris.
                Cras mattis mauris placerat faucibus pulvinar. Sed fringilla, ligula non luctus lacinia
                risus, sit amet euismod lacus tellus ac ipsum Sed fringilla, ligula non luctus lacinia
                risus, sit amet euismod lacus tellus ac ipsumSed fringilla, ligula non luctus lacinia
                risus, sit amet euismod lacus tellus ac ipsum
            </p>
            <h4 class="detalhes-desc">Compartimentos</h4>
            <div class="detalhes-header">
                <div class="com-detalhes"> <img src="images/quarto.png" class="icone-detalhes" alt=""> <b>2</b></div>
                <div class="com-detalhes"> <img src="images/garragem.png" class="icone-detalhes" alt=""> <b>3</b></div>
                <div class="com-detalhes"> <img src="images/banheiro.png" class="icone-detalhes" alt=""> <b>2 </b></div>
                <div class="com-detalhes"> <img src="images/cozinha.png" class="icone-detalhes" alt=""> <b>1</b></div>
                <div class="com-detalhes"> <img src="images/sala.png" class="icone-detalhes" alt=""> <b>1</b></div>
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

                        <?php for ($i = 1; $i <= 4; $i ++):?>
                            <div>
                                <img data-u="image" src="img/021.jpg" />
                                <div data-u="thumb">
                                    <a href="img/021-s200x100.jpg" data-lightbox="roadtrip" data-title="Image desc">
                                        <img data-u="thumb" src="img/021-s200x100.jpg" />
                                    </a>
                                </div>
                            </div>
                            <div>
                                <img data-u="image" src="img/022.jpg" />
                                <div data-u="thumb">
                                    <img data-u="thumb" src="img/022-s200x100.jpg" />
                                </div>
                            </div>
                        <?php endfor;?>

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


