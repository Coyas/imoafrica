<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 28-02-2019
 * Time: 15:08
 */

use backend\assets\passwdAsset;
use yii\helpers\Html;
use yii\helpers\Url;

PasswdAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?=$this->registerLinkTag(['rel'=>'icon', 'type'=>'image/png', 'href'=>Url::to('/sys/icon.png')]); ?>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body id="corpo">
    <?php $this->beginBody() ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?=$content?>
            </div>
        </div>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>