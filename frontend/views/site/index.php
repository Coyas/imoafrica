<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'ImoAfrica Real Estate';
//echo Html::a('PT', Url::current(['language' => 'pt-PT']))."<br>";
//echo Html::a('En', Url::current(['language' => 'en-US']))."<br>";
//echo Html::a('FR', Url::current(['language' => 'fr-FR']));
?>

<header>
    <div id="carouselExampleIndicators" class="banner carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('images/p2.jpg')">
                <!--<div class="carousel-caption d-none d-md-block">
                  <h2 class="display-4">First Slide</h2>
                  <p class="lead">This is a description for the first slide.</p>
                </div>-->
            </div>
            <div class="carousel-item" style="background-image: url('images/p1.jpg')">
            </div>
        </div>

        <div class="formpesquisatodo">
            <div class="formpesquisa">
                <form class="form-inline">
                    <div class="container">
                        <div class="row">
                            <div class="meucol selectmeu">
                                <div class="input-group mb-2 formmargin">
                                    <select class="meu-select">
                                        <option selected>Ilha</option>
                                        <option value="st">Santo Antão</option>
                                        <option value="sv">São Vicente</option>
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
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>


<!-- Page Content -->
<div class="sdestques container">
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
                        <?php for( $i = 1; $i <= 4; $i++): ?>
                            <div class="col-md-3 col-sm-6 lthome filter arrendar">
                                <div class="destaques">
                                    <img src="images/p2.jpg" class="img-fluid">
                                    <div class="text-center">
                                        <span class="property-box-label property-box-label-primary">Alugar</span>
                                        <h2 class="txt-nome"> Nome </h2>
                                        <h3 class="txt-localizacao"> Localização </h3>
                                        <h3 class="txt-dimensao"> Dimensão </h3>
                                        <h4 class="txt-preco"> PREÇO </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endfor;?>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <?php for( $i = 1; $i <= 4; $i++): ?>
                            <div class="col-md-3 col-sm-6 lthome filter comprar">
                                <div class="destaques">
                                    <img src="images/p2.jpg" class="img-fluid">
                                    <div class="text-center">
                                        <h2 class="txt-nome"> NOME </h2>
                                        <h3 class="txt-localizacao"> Localização </h3>
                                        <h3 class="txt-dimensao"> Dimensão </h3>
                                        <h4 class="txt-preco"> PREÇO </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endfor;?>
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

<div class="fullwidth sell">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center pub">
                    <img src="images/clientes.png" alt="" class="pub-img img-fluid">
                    <h3 class="pub-title"> 1000 + Clientes Satisfeitos</h3>
                    <p class="pub-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam. </p>
                    <a href="#" class="pub-btn">Saiba Mais</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center pub">
                    <img src="images/pesquisa.png" alt="" class="pub-img img-fluid">
                    <h3 class="pub-title"> Pesquisa Inteligentes </h3>
                    <p class="pub-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam. </p>
                    <a href="#" class="pub-btn">Saiba Mais</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center pub">
                    <img src="images/help.png" alt="" class="pub-img img-fluid">
                    <h3 class="pub-title"> Nos Estamos Aqui Para Ajudar </h3>
                    <p class="pub-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquam. </p>
                    <a href="#" class="pub-btn">Saiba Mais</a>
                </div>
            </div>
        </div>
    </div>
</div>