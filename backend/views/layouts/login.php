<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 26-02-2019
 * Time: 15:05
 */
use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;

LoginAsset::Register($this);
//echo Url::to('sys/icon.png');die;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="icon" href="sys/icon.png">-->
    <?=$this->registerLinkTag(['rel'=>'icon', 'type'=>'image/png', 'href'=>Url::to('sys/icon.png')]); ?>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div style="margin-left: 35%; width: 40%; margin-top: 5%;">
    <?= Alert::widget() ?>
</div>
<?= $content ?>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
