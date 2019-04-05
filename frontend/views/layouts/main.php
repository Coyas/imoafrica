<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--    <link rel="icon" href="icon.png">-->
    <?=$this->registerLinkTag(['rel'=>'icon', 'type'=>'image/png', 'href'=>Url::to('icon.png')]); ?>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<body id="fundo">
<?php $this->beginBody() ?>

<!--Menu que sera fixo-->


<!-- Navigation -->
<div id="banner">
    <nav id="navscroll" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <div class="meumenu">
                <div class="menumob">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="fas fa-bars"></i>
        </span>
                    </button>

                </div>
                <div class="logom">
                    <img src="images/logop.png" alt="" class="imlogom">
                </div>
                <div class="telem">
                    <span> <img src="images/phone.png" width="30" height="30" alt="" class=""> 921 01 15</span>
                </div>
            </div>

            <div class="logop">
<!--                <a class="navbar-brand" href="#">-->
<!--                    <img  src="images/logop.png" alt="" class="logo">-->
<!--                </a>-->
                <?= Html::a(Html::img('images/logop.png', ['class' => 'logo']),['site/index'], ['class' => 'navbar-brand']) ?>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul id="tt" class="navbar-nav ml-auto">
                    <li class="nav-item active">
<!--                        <a class="nav-link" href="#">Arrendar</a>-->
                        <?= Html::a(Yii::t('app', 'Arrendar'), ['site/arrendar'], ['class' => 'nav-link'])?>
                    </li>
                    <li class="nav-item">
<!--                        <a class="nav-link" href="#">Comprar</a>-->
                        <?= Html::a(Yii::t('app', 'Comprar'), ['site/comprar'], ['class' => 'nav-link'])?>
                    </li>
                    <li class="nav-item">
<!--                        <a class="nav-link" href="#">Vender</a>-->
                        <?= Html::a(Yii::t('app', 'Vender'), ['site/contact'], ['class' => 'nav-link'])?>
                    </li>
                    <li class="nav-item">
<!--                        <a class="nav-link" href="#">Legalizar</a>-->
                        <?= Html::a(Yii::t('app', 'Legalizar'), ['site/legalizar'], ['class' => 'nav-link'])?>
                    </li>
                    <li class="nav-item">
<!--                        <a class="nav-link" href="#">Contactos</a>-->
                        <?= Html::a(Yii::t('app', 'Contactos'), ['site/contact'], ['class' => 'nav-link'])?>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
<!--                        <a class="nav-link" href="#">Junte-se a nós</a>-->
                        <?= Html::a(Yii::t('app', 'Junte-se a nós'), ['site/junte'], ['class' => 'nav-link'])?>
                    </li>
                    <li class="nav-item">
<!--                        <a class="nav-link" href="#">Avaliação</a>-->
                        <?= Html::a(Yii::t('app', 'Avaliação'), ['site/avaliacao'], ['class' => 'nav-link'])?>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link bold" id="tel" href="tel:002389210115"><img src="images/phone.png" width="30" height="30" alt="" class="">  (+238) 921 01 15</a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown">
                                <?php
                                $lang = Yii::$app->params['lang'];
                                    if ($lang ==='pt-PT'){
                                        echo Html::img(Url::to('images/pt.png'), ['width' => 40, 'height' => 40]);

                                    }elseif ($lang === 'en-US'){
                                        echo Html::img(Url::to('images/en.png'), ['width' => 40, 'height' => 40]);
                                    }elseif ($lang === 'fr-FR'){
                                        echo Html::img(Url::to('images/fr.png'), ['width' => 40, 'height' => 40]);
                                    }else{
                                        echo Html::img(Url::to('images/pt.png'), ['width' => 40, 'height' => 40]);
                                    }
                                ?>
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu"><!--data-toggle="tooltip" data-placement="left" title="Hooray!"-->
                                <?php if ($lang === 'pt-PT'){ ?>
                                    <li><?= Html::a(Html::img(Url::to('images/fr.png'), [ 'title' => 'Frances', 'width' => 40, 'height' => 40]), Url::current(['language' => 'fr-FR']))?></li>
                                    <li><?= Html::a(Html::img(Url::to('images/en.png'), ['title' => 'Ingles', 'width' => 40, 'height' => 40]), Url::current(['language' => 'en-US']))?></li>

                                <?php }elseif ($lang === 'fr-FR'){?>
                                    <li><?= Html::a(Html::img(Url::to('images/pt.png'), [ 'title' => 'Portugues', 'width' => 40, 'height' => 40]), Url::current(['language' => 'pt-PT']))?></li>
                                    <li><?= Html::a(Html::img(Url::to('images/en.png'), ['title' => 'Ingles', 'width' => 40, 'height' => 40]), Url::current(['language' => 'en-US']))?></li>
                                <?php }elseif ($lang === 'en-US'){?>
                                    <li><?= Html::a(Html::img(Url::to('images/pt.png'), ['title' => 'Portugues', 'width' => 40, 'height' => 40]), Url::current(['language' => 'pt-PT']))?></li>
                                    <li><?= Html::a(Html::img(Url::to('images/fr.png'), [ 'title' => 'Frances', 'width' => 40, 'height' => 40]), Url::current(['language' => 'fr-FR']))?></li>
                                <?php }?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--fim do menu fixo-->

<!--inicio do fullpage-->
<div id="fullpage">

    <?= $content ?>
    <div id="foot" class="section fp-auto-height">

        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <p><?= date('Y')?> © ImoAfrica. <?=Yii::t('app', 'Todos os direitos reservados')?><br>
                            <?=Yii::t('app', 'Implementado pela')?> <a href="https://innovatmedia.com" target="_blank">iMedia Innovative media</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <?= Html::a(Html::img(Url::to('images/facebook.png'), ['width' => 50, 'height' => 50, 'alt' => 'Nosso Facebook']), 'https://web.facebook.com/imoafricarealestate/', ['class' => 'facebooklink', 'target' => '_blank'])?>
                        <?= Html::a(Html::img(Url::to('images/instagram.png'), ['width' => 50, 'height' => 50, 'alt' => 'Nosso Instagram']), 'https://tufjghgt.ate/', ['class' => 'instagramlink', 'target' => '_blank'])?>
<!--                        <a class="facebooklink" href="#"> <img src="images/facebook.png" width="50" height="50" alt="Nosso Facebook"> </a>-->
<!--                        <a class="instagramlink" href="#"> <img src="images/instagram.png" width="50" height="50" alt="Nosso Instagram"> </a>-->
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
