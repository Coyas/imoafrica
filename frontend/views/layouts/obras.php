<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 3/27/19
 * Time: 4:55 PM
 */

?>

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
<body id="fundo">
<?php $this->beginBody() ?>

    <?= $content ?>

<div class="section">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <p><?= date('Y')?> © ImoAfrica. Todos os direitos reservados<br>
                        Implementado pela <a href="https://innovatmedia.com" target="_blank">iMedia Innovative media</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <?= Html::a(Html::img(Url::to('images/facebook.png'), ['width' => 50, 'height' => 50, 'alt' => 'Nosso Facebook']), 'https://web.facebook.com/imoafricarealestate/', ['class' => 'facebooklink', 'target' => '_blank'])?>
                    <?= Html::a(Html::img(Url::to('images/instagram.png'), ['width' => 50, 'height' => 50, 'alt' => 'Nosso Instagram']), 'https://thjdjdfdgdfdgg.com/fsdfssd/', ['class' => 'instagramlink', 'target' => '_blank'])?>
                    <!--                        <a class="facebooklink" href="#"> <img src="images/facebook.png" width="50" height="50" alt="Nosso Facebook"> </a>-->
                    <!--                        <a class="instagramlink" href="#"> <img src="images/instagram.png" width="50" height="50" alt="Nosso Instagram"> </a>-->
                </div>
            </div>

        </div>
    </div>
</div>


<?php
$this->registerJs(
    " new fullpage('#fullpage', {
        //licença
        licenseKey: '57FD467D-B08342AA-83713A7A-94441FA6',
        //options here
        autoScrolling:true,
        scrollHorizontally: true,
        lazyLoading: true,
        navigation: true,
	    navigationPosition: 'right',
	    showActiveTooltip: false,
	    scrollOverflow: true,
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
