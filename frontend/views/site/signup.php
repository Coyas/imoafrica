<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section">
    <div class="site-signup">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the following fields to signup:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

    <!--fim do fullpage-->
<?php
$this->registerJs(
    "
     $(document).ready(function(){
        $('[data-toggle=\"tooltip\"]').tooltip();   
      });
      
     new fullpage('#fullpage', {
        //licença
        licenseKey: '57FD467D-B08342AA-83713A7A-94441FA6',
        //options here
        autoScrolling:true,
        scrollHorizontally: true,
        lazyLoading: true,
        navigation: true,
	    navigationPosition: 'right',
	    continuousHorizontal: true,
	    showActiveTooltip: false,
	    scrollOverflow: false,
        //scrollingSpeed: 5000,
        //easing: 'easeInOutCubic',
        //equivalent to jQuery `easeOutBack` extracted from http://matthewlein.com/ceaser/
        //easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',

        

    });

    //methods
    fullpage_api.setAllowScrolling(true);
//    $(\"#banner\").hide();",
    View::POS_END,
    'myfullpage'
);
?>