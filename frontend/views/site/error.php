<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\web\View;

$this->title = $name;
?>
<div class="section">
<!--    <div class="site-error">-->
<!---->
<!--        <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--        <div class="alert alert-danger">-->
<!--            --><?php //= nl2br(Html::encode($message)) ?>
<!--        </div>-->
<!---->
<!--        <p>-->
<!--            The above error occurred while the Web server was processing your request.-->
<!--        </p>-->
<!--        <p>-->
<!--            Please contact us if you think this is a server error. Thank you.-->
<!--        </p>-->
<!---->
<!--    </div>-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <center>
                   <span class="error1">
                       404
                   </span>
                   <p class="errorName"><?= nl2br(Html::encode($message)) ?></p>
               </center>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerJs(
    "$(\"#banner\").show();",
    View::POS_LOAD,
    'shownave'
);
?>