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
    <?=$this->registerLinkTag(['rel'=>'icon', 'type'=>'image/png', 'href'=>Url::to('/icon.png')]); ?>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>
<body>
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
                        <?= Html::a(Yii::t('app', 'Vender'), ['site/vender'], ['class' => 'nav-link'])?>
                    </li>
                    <li class="nav-item">
<!--                        <a class="nav-link" href="#">Legalizar</a>-->
                        <?= Html::a(Yii::t('app', 'Legalizar'), ['site/contact'], ['class' => 'nav-link'])?>
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
                        <?= Html::a(Yii::t('app', 'Avaliação'), ['site/contact'], ['class' => 'nav-link'])?>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link bold" href="#"> <img src="images/phone.png" width="30" height="30" alt="" class=""> (+238) 921 01 15</a>
                    </li>
                    <li>
                        <div class="btn-group">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img width="40" height="40" src="images/pt.png">
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" title="Select this card"><img width="40" height="40" src="images/fr.png"></a>
                                </li>
                                <li>
                                    <a href="#" title="Select this card"><img width="40" height="40" src="images/en.png"></a>
                                </li>

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
                        <p>2018 © ImoAfrica. Todos os direitos reservados<br>
                            Implementado pela <a href="#">iMedia Innovative media</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="facebooklink" href="#"> <img src="images/facebook.png" width="50" height="50" alt="Nosso Facebook"> </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!--fim do fullpage-->
<?php
$this->registerJs(
    " new fullpage('#fullpage', {
        //licença
        licenseKey: '57FD467D-B08342AA-83713A7A-94441FA6',
        //options here
        autoScrolling:true,
        scrollHorizontally: true,
        lazyLoading: true,
        //scrollingSpeed: 5000,
        //easing: 'easeInOutCubic',
        //equivalent to jQuery `easeOutBack` extracted from http://matthewlein.com/ceaser/
        //easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',

        onLeave: function(origin, destination, direction){
            var leavingSection = this;

            //after leaving section 2
            if(origin.index == 0 && direction =='down'){
                $('#banner').fadeIn();
            }
            else if(origin.index == 1 && direction == 'up'){
                 $('#banner').fadeOut();
            }
        }

    });

    //methods
    fullpage_api.setAllowScrolling(true);
    $(\"#banner\").hide();",
    View::POS_END,
    'myfullpage'
);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
