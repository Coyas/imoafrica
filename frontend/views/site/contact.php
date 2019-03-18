<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contacto';
?>
<div class="container-fluid">
    <div class="row">
        <div style="background-color: #fff;" class="col-md-6 mh-100 p-0">
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15420.877359107766!2d-23.5081126!3d14.9248684!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3555f5db0b9eaa9a!2sIMOAFRICA+-+MEDIA%C3%87%C3%83O+IMOBILI%C3%81RIA%2C+LDA!5e0!3m2!1spt-PT!2scv!4v1552582647675" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="contatodesc col-md-6 mh-100 p-0">
            <div class="contato">
                <h1 class="titlecontato"> Contatos </h1>
                <div class="dadosendereco">
                    <span class="itemscontato"> <img src="images/tele.png" width="20" height="20" alt=""> <a class="t" href="tel:003282987677">(+238) 298 76 77</a> </span>
                    <span class="itemscontato"> <img src="images/email.png" width="20" height="20" alt=""> <a class="t" href="mailto:geral@imoafrica.com ">geral@imoafrica.com </a></span>
                    <span class="itemscontato"> <img src="images/endereco.png" width="20" height="20" alt=""> Rua Caixa Economica, ao lado INE Fazenda, Praia Santiago cv, Praia 7300 </span>
                    <span class="itemscontato"> <img src="images/aberto.png" width="20" height="20" alt=""> Aberto de Segunda á Sexta das 8:00Hr ás 19:00Hr </span>
                </div>
            </div>

            <div class="formfale">
                <h1 class="titleform"> Fale Connosco </h1>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="input-group col-md-12">
                                    <input class="inputcontato" type="text" placeholder="Nome">
                                </div>
                                <div class="input-group col-md-12">
                                    <input class="inputcontato" type="email" placeholder="E-mail">
                                </div>

                                <div class="input-group col-md-12">
                                    <select class="meuselectcontato" name="" id="">
                                        <optgroup>
                                            <option value=""> Assunto </option>
                                            <option value="">Legalizar imoveis</option>
                                            <option value="">Avaliar Propriedade</option>
                                            <option value="">outro</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="input-group col-md-12">
                                    <textarea class="col-md-12 meutextareac" name="" id="" rows="4" placeholder="Mensagem"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="input-group col-md-12">
                            <input class="meubotaocontatoreverse" name="" value="Enviar" id="" type="submit">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


