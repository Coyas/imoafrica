<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 3/14/19
 * Time: 2:27 PM
 */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

?>
    <div id="cabe"  class="section fp-auto-height">
<!--        <div  class="container-fluid">-->
<!--            <h1 class="gallery-title"> </h1>-->
<!--        </div>-->
    </div>
<div class="section fp-auto-height">
    <div class="container-fluid">
        <div class="row">

            <h1 class="juntese"><?= Yii::t('app', 'Junte-se a nós')?></h1>
            <div class="imgjuntese col-md-8 mh-100 p-0">
            </div>
            <div class=" col-md-4 mh-100 p-0">
                <div class="fomrjuntese">

                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <?php if(Yii::$app->session->hasFlash('success')){ ?>
                        <div class="alert alert-success" role="alert">
                            <?= Yii::t('app', 'Obrigado por nos contactar. Nós iremos responder mais breve possivel.')?>
                        </div>
                    <?php }else if(Yii::$app->session->hasFlash('error')){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?= Yii::t('app', 'Houve um problema ao enviar o email, tente denovo mais tarde.')?>
                        </div>
                    <?php }else { ?>
<!--                    <form action="">-->
                    <div class="row">

                        <div class="col-md-12">
                            <?= $form->field($junte, 'nome')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Nome'), 'class' => 'inputcontato'])->label(false) ?>

                            <?= $form->field($junte, 'email')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'E-mail'), 'class' => 'inputcontato'])->label(false) ?>

                            <?= $form->field($junte, 'telefone')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Telefone'), 'class' => 'inputcontato'])->label(false) ?>

                            <?= $form->field($junte, 'morada')->textInput(['maxlength' => true, 'placeholder' => Yii::t('app', 'Morada'), 'class' => 'inputcontato'])->label(false) ?>

                            <?= $form->field($junte, 'content')->textarea(['rows' => 4, 'placeholder' => Yii::t('app', 'Mensagem'), 'class' => 'col-md-12 meutextareac'])->label(false) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Curriculum Vitae</p>
                            <?= $form->field($junte, 'anexo')->fileInput(['maxlength' => true, 'class' => 'inputfile', 'id' => 'file'])->label(false) ?>
                            <label for="file"><?=Yii::t('app', 'Selecione ficheiro')?></label>
                            <p class="small">pdf .doc .docx</p>
                        </div>
                        <div class="col-md-6">
                            <p></p>
                            <?= Html::submitButton(Yii::t('app', 'Enviar'), ['class' => 'meubotaocontatoj pull-left']); } ?>
                        </div>
                    </div>

<!--                    </form>-->
                    <?php ActiveForm::end();?>
                </div>
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