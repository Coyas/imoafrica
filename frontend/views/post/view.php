<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = "detalhes dos posts";
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="section">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        foreach ($model as $m){
            echo 'title: '.$m['title'].'<br>';
            echo 'slug: '.$m['slug'].'<br>';
            echo 'content: '.$m['content'].'<br>';
        }
    ?>


</div>
