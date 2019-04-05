<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 3/27/19
 * Time: 5:01 PM
 */

use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\web\View;
?>

<div class="section">
    <div class="section fp-auto-height">
        <div class="container-fluid">
            <div class="row">

                <div style="background-color: black;border-bottom: 1px solid #ecba49;border-right: 1px solid #ecba49;" class="col-md-6 mh-100 p-0">
                    <center id="obra" >
                        <img src="images/logop.png">
                        <p class="titlecontato">Site Em Obras</p>
                        <h4 style="color: #ecba49;">Voltamos Em Breve</h4>
                    </center>
                </div>

                <div class="contatodesc col-md-6 mh-100 p-0">
                    <div class="contato">
                        <h1 class="titlecontato"> <?= Yii::t('app', 'Contactos ') ?></h1>
                        <div class="dadosendereco">
                            <span class="itemscontato"> <img src="images/tele.png" width="20" height="20" alt=""> (+238) 298 76 77 </span>
                            <span class="itemscontato"> <img src="images/email.png" width="20" height="20" alt=""> geral@imoafrica.com </span>
                            <span class="itemscontato"> <img src="images/endereco.png" width="20" height="20" alt=""> Rua Caixa Economica, ao lado INE Fazenda, Praia Santiago cv, Praia 7300 </span>
                            <span class="itemscontato"> <img src="images/aberto.png" width="20" height="20" alt=""> Aberto de Segunda á Sexta das 8:00Hr ás 19:00Hr </span>
                        </div>
                    </div>

                    <div class="formfale">
                        <?php if(Yii::$app->session->hasFlash('success')){ ?>
                            <div class="alert alert-success" role="alert">
                                <?= Yii::t('app', 'Obrigado por nos contactar. Nós iremos responder mas breve possivel.')?>
                            </div>
                        <?php }else if(Yii::$app->session->hasFlash('error')){ ?>
                            <div class="alert alert-danger" role="alert">
                                <?= Yii::t('app', 'Ouve um problema ao enviar o email, tente de novo mais tarde.')?>
                            </div>
                        <?php }else { ?>
                            <h1 class="titleform"> Fale Connosco </h1>
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="input-group col-md-12">
                                            <!--                                        <input class="inputcontato" type="text" placeholder="Nome">-->
                                            <?= $form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Nome'), 'class' => 'inputcontato'])->label(false); ?>
                                        </div>
                                        <div class="input-group col-md-12">
                                            <!--                                        <input class="inputcontato" type="email" placeholder="E-mail">-->
                                            <?= $form->field($model, 'email')->textInput(['class' => 'inputcontato','placeholder' => Yii::t('app', 'E-mail')])->label(false) ?>
                                        </div>

                                        <div class="input-group col-md-12">
                                            <?= $form->field($model, 'subject')->dropDownList(
                                                ['Informaçes da empresa' => 'Informaçes da empresa',
                                                    'Legalizar imovel' => ' Legalizar imovel',
                                                    'Avaliar Propriedade' => 'Avaliar Propriedade',
                                                    'Outro' => 'Outro'],
                                                ['prompt'=>'Assunto...'], ['class' => 'meuselectcontato'])->label(false);
                                            ?>
                                            <!--                                        <select class="meuselectcontato" name="" id="">-->
                                            <!--                                            <optgroup>-->
                                            <!--                                                <option value=""> Informaçes da empresa</option>-->
                                            <!--                                                <option value=""> Legalizar imovel</option>-->
                                            <!--                                                <option value=""> Avaliar Propriedade</option>-->
                                            <!--                                                <option value=""> OUTRO</option>-->
                                            <!--                                            </optgroup>-->
                                            <!--                                        </select>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="input-group col-md-12">
                                            <!--                                        <textarea class="col-md-12 meutextareac" name="" id="" rows="4" placeholder="Mensagem"></textarea>-->
                                            <?= $form->field($model, 'body')->textarea(['rows' => 4, 'class' => 'col-md-12 meutextareac', 'placeholder' => Yii::t('app', 'Mensagem')])->label(false) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group col-md-12">
                                    <!--                                <input class="meubotaocontatoreverse" name="" value="Enviar" id="" type="submit">-->
                                    <?= Html::submitButton(Yii::t('app','Enviar'), ['class' => 'meubotaocontatoreverse', 'name' => 'contact-button']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); }?>
                    </div>

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