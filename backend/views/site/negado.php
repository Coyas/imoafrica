<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 28-02-2019
 * Time: 15:43
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div id="caxa">


    <figure>
        <?=Html::a(Html::img(Url::to('/sys/fav.png'), ['class' => 'icon', 'height' => 180, 'width' => 180]), ['site/change-password', 'id' => Yii::$app->user->identity->getId()])?>
        <figcaption>Não tens permição suficiente para este local</figcaption>
    </figure>

</div>
