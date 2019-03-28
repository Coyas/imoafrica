<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;

$this->title = 'ImoAfrica Real Estate';
//echo Html::a('PT', Url::current(['language' => 'pt-PT']))."<br>";
//echo Html::a('En', Url::current(['language' => 'en-US']))."<br>";
//echo Html::a('FR', Url::current(['language' => 'fr-FR']));
?>

<div class="section">
    <div id="img">
        <!-- Page Content -->
        <section>
            <div class="container">
                <div class="float-right row">
                    <div class="p-3">
                        <!--                            <a href="#" title="Português"><img class="imglp" src="images/pt.png"></a>-->
                        <!--                            <a href="#" title="Inglês"><img class="imglp" src="images/en.png"></a>-->
                        <!--                            <a href="#" title="Francês"><img class="imglp"  src="images/fr.png"></a>-->
                        <?= Html::a(Html::img(Url::to('images/pt.png'), ['class' => 'imglp']), Url::current(['language' => 'pt-PT']), ['title' => 'Português'])?>
                        <?= Html::a(Html::img(Url::to('images/en.png'), ['class' => 'imglp']), Url::current(['language' => 'en-US']), ['title' => 'Inglês'])?>
                        <?= Html::a(Html::img(Url::to('images/fr.png'), ['class' => 'imglp']), Url::current(['language' => 'fr-FR']), ['title' => 'Francês'])?>
                    </div>
                </div>
            </div>
        </section>
        <div id="meubanner">
            <nav id="meunav" class="navbar navbar-expand-lg fixed-bottommeu">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <!--                            <a class="nav-link" href="#">Arrendar</a>-->
                                <?= Html::a(Yii::t('app', 'Arrendar'), ['site/arrendar'], ['class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                <!--                            <a class="nav-link" href="#">Comprar</a>-->
                                <?= Html::a(Yii::t('app', 'Comprar'), ['site/comprar'], ['class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                <!--                            <a class="nav-link" href="#">Vender</a>-->
                                <?= Html::a(Yii::t('app', 'Vender'), ['site/vender'], ['class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                <!--                            <a class="nav-link" href="#">Legalizar</a>-->
                                <?= Html::a(Yii::t('app', 'Legalizar'), ['site/legalizar'], ['class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                <!--                            <a class="nav-link" href="#">Contactos</a>-->
                                <?= Html::a(Yii::t('app', 'Contactos'), ['site/contact'], ['class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item active">
                                <!--                            <a class="nav-link" href="#">Junte-se a nós</a>-->
                                <?= Html::a(Yii::t('app', 'Junte-se a nós'), ['site/junte'], ['class' => 'nav-link'])?>
                            </li>
                            <li class="nav-item">
                                <!--                            <a class="nav-link" href="#">Avaliação</a>-->
                                <?= Html::a(Yii::t('app', 'Avaliação'), ['site/avaliacao'], ['class' => 'nav-link'])?>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
        <div class="fixed-footer p-3 footermobile">
            <!--        <a href="#"> <img src="images/facebook.png" width="50" height="50" alt="Nosso Facebook"> </a>-->
            <a href="#"> <?= Html::img(URL::to(Yii::$app->params['img'].'faceboook.png', true), ['width' => 50, 'height' => 50, 'alt' => 'Nosso Facebook']);?> </a>

        </div>

    </div>

</div>
<!--<div class="section">-->
<!--    <header>-->
<!--        <div id="carouselExampleIndicators" class="banner carousel slide" data-ride="carousel">-->
<!--            <ol class="carousel-indicators">-->
<!--                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
<!--                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
<!--                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
<!--            </ol>-->
<!--            <div class="carousel-inner" role="listbox">-->
<!--                <div id="sl0" class="carousel-item active">-->
<!--                    <div class="carousel-caption d-none d-md-block">-->
<!--                      <h2 class="display-4">First Slide</h2>-->
<!--                      <p class="lead">This is a description for the first slide.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div id="sl1" class="carousel-item" >-->
<!--                </div>-->
<!--                <div id="sl2" class="carousel-item">-->
<!--                    <img class="d-block w-100" src="../publi/new1.webp" alt="First slide">-->
<!--                  <div class="carousel-caption d-none d-md-block">-->
<!--                      <h2 class="display-4">First Slide</h2>-->
<!--                      <p class="lead">This is a description for the first slide.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="formpesquisatodo">-->
<!--                <div class="formpesquisa">-->
<!--                    <form class="form-inline">-->
<!--                        <div class="container">-->
<!--                            <div class="row">-->
<!--                                <div class="meucol selectmeu">-->
<!--                                    <div class="input-group mb-2 formmargin">-->
<!--                                        <select class="meu-select">-->
<!--                                            <option selected>Ilha</option>-->
<!--                                            <option value="st">Santo Antão</option>-->
<!--                                            <option value="sv">São Vicente</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="meucol inputmeu">-->
<!--                                    <div class="input-group mb-2 formmargin">-->
<!--                                        <input type="text" class="meu-form" id="" placeholder="Zona">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="meucol selectmeu">-->
<!--                                    <div class="input-group mb-2 formmargin">-->
<!--                                        <select class="meu-select">-->
<!--                                            <option selected>Tipo Propriedade</option>-->
<!--                                            <option value="1">One</option>-->
<!--                                            <option value="2">Two</option>-->
<!--                                            <option value="3">Three</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="meucol inputmeu">-->
<!--                                    <div class="input-group mb-2 formmargin">-->
<!--                                        <input type="text" class="meu-form" id="" placeholder="Apartir de">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="meucol inputmeu">-->
<!--                                    <div class="input-group mb-2 mr-sm-2">-->
<!--                                        <input type="text" class="meu-form" id="" placeholder="Até">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="meucol inputmeu">-->
<!--                                    <button type="submit" class="meubotao mb-2"> Filtrar propriedade</button>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">-->
<!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                <span class="sr-only">Previous</span>-->
<!--            </a>-->
<!--            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">-->
<!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                <span class="sr-only">Next</span>-->
<!--            </a>-->
<!--        </div>-->
<!--    </header>-->
<!---->
<!--</div>-->
<div class="section">
    <?php foreach ($destaques as $destaque){
        //        pegar dono
//        select d.nome, d.apelido from dono d left join dono_propriedade dp on d.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 1;
        $dono = (new Query())
            ->select('d.nome, d.apelido')
            ->from('dono d')
            ->leftJoin('dono_propriedade dp', 'd.id = dp.id_dono')
            ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
            ->where(['p.id' => $destaque['id']])
            ->One();

        $pasta = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
//        echo Yii::$app->params['upload'].$pasta."/".$destaque['foto']."<br>";
//        echo Yii::$app->urlManagerB->createUrl(Yii::$app->params['upload'].$pasta."/".$destaque['foto']);
//        echo Html::a('Contact YiiLIb.com', Yii::$app->urlManagerB->createUrl(Yii::$app->params['upload'].$pasta."/".$destaque['foto']));
        ?>

        <?php //html::img(Url::to("/".Yii::$app->params['upload'].$pasta."/".$destaque['foto']), ['class' => 'd-block w-100']);?>
        <div class="slide" data-anchor="slide1"> <?= html::img(Yii::$app->urlManagerB->createUrl(Yii::$app->params['upload'].$pasta."/".$destaque['foto']), ['class' => 'd-block w-100'])?></div>
<!--        <div class="slide" data-anchor="slide1"> --><?php //// html::img(Url::to(Yii::$app->params['upload'].$pasta."/".$destaque['foto'], true), ['class' => 'd-block w-100'])?><!--</div>-->
<!--        <div class="slide" data-anchor="slide1"> <img class="d-block w-100" src="../publi/new1.webp" alt="First slide"></div>-->
    <?php } //die;?>
    <div class="formpesquisatodo">
        <div class="formpesquisa">
            <form class="form-inline">
                <div class="container">
                    <div class="row">
                        <div class="meucol selectmeu">
                            <div class="input-group mb-2 formmargin">
                                <select class="meu-select">
                                    <option selected>Conselho</option>
                                    <option value="st">Praia</option>
                                    <option value="sv">Assomada</option>
                                    <option value="sv">S.l. Orgaos</option>
                                    <option value="sv">Picos</option>
                                    <option value="sv">Calheta</option>
                                    <option value="sv">Tarrafal</option>
                                    <option value="sv">Cidade Velha</option>
                                    <option value="sv">Ribeira da Barca</option>
                                    <option value="sv">Sao Domingos</option>
                                </select>
                            </div>
                        </div>
                        <div class="meucol inputmeu">
                            <div class="input-group mb-2 formmargin">
                                <input type="text" class="meu-form" id="" placeholder="Zona">
                            </div>
                        </div>
                        <div class="meucol selectmeu">
                            <div class="input-group mb-2 formmargin">
                                <select class="meu-select">
                                    <option selected>Tipo Propriedade</option>
                                    <option value="1">Apartamento T1</option>
                                    <option value="1">Apartamento T2</option>
                                    <option value="1">Apartamento T3</option>
                                    <option value="2">Terreno + Casa</option>
                                    <option value="3">Aeroporto Privado</option>
                                </select>
                            </div>
                        </div>
                        <div class="meucol inputmeu">
                            <div class="input-group mb-2 formmargin">
                                <input type="text" class="meu-form" id="" placeholder="Apartir de">
                            </div>
                        </div>
                        <div class="meucol inputmeu">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="meu-form" id="" placeholder="Até">
                            </div>
                        </div>
                        <div class="meucol inputmeu">
                            <button type="submit" class="meubotao mb-2"> Filtrar propriedade</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="section">
    <!-- Page Content -->
    <div class="sdestques caixaslid">
        <div class="row">
            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="gallery-title">Destaques</h1>
                <div class="text-center">
                    <button class="btn btn-default filter-button active" data-filter="all">Todos</button>
                    <button class="btn btn-default filter-button" data-filter="arrendar">Arrendar</button>
                    <button class="btn btn-default filter-button" data-filter="comprar">Comprar</button>
                </div>
            </div>
            <br/>

            <div id="destaquesCarousel" class="destaq carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php foreach ($slides as $slide){
                                //        select d.nome, d.apelido from dono d left join dono_propriedade dp on d.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 1;
                                $dono = (new Query())
                                    ->select('d.nome, d.apelido')
                                    ->from('dono d')
                                    ->leftJoin('dono_propriedade dp', 'd.id = dp.id_dono')
                                    ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
                                    ->where(['p.id' => $slide['id']])
                                    ->One();

                                $pasta2 = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
                                ?>
                                <div class="col-md-3 col-sm-6 lthome filter arrendar">
                                    <a id="slides" href="<?=Url::to(['site/detalhes', 'id' => $slide['id']])?>">
                                        <div class="destaques">
    <!--                                        <img src="images/p2.jpg" class="img-fluid">-->
                                            <?= Html::img(Yii::$app->urlManagerB->createUrl(Yii::$app->params['upload'].$pasta2."/".$slide['foto']), ['class' => 'img-fluid imgin'])?>
                                            <div class="text-center">
                                                <span class="property-box-label property-box-label-primary"><?= $slide['proposito'] == 0 ? "Arrendar" : "A Venda"?></span>
                                                <h2 class="txt-nome"> <?= $slide['nomePt'] ?>  </h2>
                                                <h3 class="txt-localizacao"> <?=$slide['ilha']?>, <?=$slide['zona']?> </h3>
                                                <h3 class="txt-dimensao"> <?= $slide['area']?>m<sup>2</sup> </h3>
                                                <h4 class="txt-preco"> <?=$slide['preco']?> $00 </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <?php foreach ($slides as $slide){
                                //        select d.nome, d.apelido from dono d left join dono_propriedade dp on d.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 1;
                                $dono = (new Query())
                                    ->select('d.nome, d.apelido')
                                    ->from('dono d')
                                    ->leftJoin('dono_propriedade dp', 'd.id = dp.id_dono')
                                    ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
                                    ->where(['p.id' => $slide['id']])
                                    ->One();

                                $pasta3 = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
                                ?>
                                <div class="col-md-3 col-sm-6 lthome filter arrendar">
                                    <a id="slides" href="<?=Url::to(['site/detalhes', 'id' => $slide['id']])?>">
                                        <div class="destaques">
                                            <!--                                        <img src="images/p2.jpg" class="img-fluid">-->
                                            <?= Html::img(Yii::$app->urlManagerB->createUrl(Yii::$app->params['upload'].$pasta3."/".$slide['foto']), ['class' => 'img-fluid imgin'])?>
                                            <div class="text-center">
                                                <span class="property-box-label property-box-label-primary"><?= $slide['proposito'] == 0 ? "Arrendar" : "A Venda"?></span>
                                                <h2 class="txt-nome"> <?= $slide['nomePt'] ?>  </h2>
                                                <h3 class="txt-localizacao"> <?=$slide['ilha']?>, <?=$slide['zona']?> </h3>
                                                <h3 class="txt-dimensao"> <?= $slide['area']?>m<sup>2</sup> </h3>
                                                <h4 class="txt-preco"> <?=$slide['preco']?> $00 </h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            <?php } ?>
                        </div>
                    </div>

                    <ol class="carousel-indicators">
                        <li data-target="#destaquesCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#destaquesCarousel" data-slide-to="1"></li>
                    </ol>

                </div>
            </div>

        </div>
    </div>

</div>

<div class="section ">
    <div class="fullwidth sell">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center pub">
                        <img src="images/clientes.png" alt="" class="pub-img img-fluid">
                        <h3 class="pub-title"> ??? Clientes Satisfeitos</h3>
                        <p class="pub-text"> Confira os varios clientes satisfeitos e seus testimunhos. </p>
                        <a href="#" class="pub-btn aa">Saiba Mais</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center pub">
                        <img src="images/pesquisa.png" alt="" class="pub-img img-fluid">
                        <h3 class="pub-title"> Pesquisas Inteligente </h3>
                        <p class="pub-text"> Dispomos de uma ferramenta para pesquisa filtrada de propriedades. </p>
                        <a href="#" class="pub-btn aa">Saiba Mais</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center pub">
                        <img src="images/help.png" alt="" class="pub-img img-fluid">
                        <h3 class="pub-title"> Nós Estamos Aqui Para Ajudar </h3>
                        <p class="pub-text"> Na oferta de um serviço integrado e global no mundo de mediação imobiliária. </p>
                        <a href="#" class="pub-btn aa">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

