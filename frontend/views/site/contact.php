<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\web\View;

$this->title = 'Contacto';
?>

<div  class="section fp-auto-height">
    <div id="cabe" class="container-fluid">
        <h1 class="gallery-title"> </h1>
    </div>
</div>

<div class="section fp-auto-height">
    <div class="container-fluid">
        <div class="row">

            <div class="contatodesc col-md-6 mh-100 p-0">
                <div class="contato">
                    <h1 class="titlecontato"> <?= Yii::t('app', 'Contactos') ?></h1>
                    <div class="dadosendereco">
                        <span class="itemscontato"> <img src="images/tele.png" width="20" height="20" alt=""> (+238) 298 76 77 </span>
                        <span class="itemscontato"> <img src="images/email.png" width="20" height="20" alt=""> geral@imoafrica.com </span>
                        <span class="itemscontato"> <img src="images/endereco.png" width="20" height="20" alt=""> Rua Caixa Economica, ao lado INE Fazenda, Praia Santiago cv, Praia 7300 </span>
                        <span class="itemscontato"> <img src="images/aberto.png" width="20" height="20" alt=""> <?= Yii::t('app', 'Aberto de Segunda á Sexta das 8:00Hr ás 19:00Hr')?> </span>
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
                    <h1 class="titleform"> <?=Yii::t('app', 'Fale Connosco')?> </h1>
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
                                            ['prompt'=> Yii::t('app', 'Assunto...')], ['class' => 'meuselectcontato'])->label(false);
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
                                <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Enviar')), ['class' => 'meubotaocontatoreverse', 'name' => 'contact-button']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); }?>
                </div>

            </div>

            <div style="background-color: #fff;" class="col-md-6 mh-100 p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15420.877359107766!2d-23.5081126!3d14.9248684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3555f5db0b9eaa9a!2sIMOAFRICA+-+MEDIA%C3%87%C3%83O+IMOBILI%C3%81RIA%2C+LDA!5e0!3m2!1spt-PT!2scv!4v1552915948916" frameborder="0" style="border:0" allowfullscreen></iframe>
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



