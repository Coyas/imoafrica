<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

?>
<div class="section fp-auto-height">
    <div id="cabe" class="container-fluid">
        <h1 class="gallery-title"> </h1>
    </div>
</div>
<div class="section fp-auto-height">
    <div id="cabe" class="container-fluid">
        <h1 class="gallery-title"> Venda aqui a sua Propriedade </h1>
    </div>
</div>
<div class="section fp-auto-height">
    <div  class="container-fluid">
        <div id="vender" class="row">
            <div style="background-color: #000;" class="col-md-4 mh-100">
                <?= Html::img(Url::to('images/vender.webp'), ['class' => 'vender']) ?>
            </div>
            <div class="formcadpro col-md-8 mh-100">
                <!-- Multi step form -->
                <section class="multi_step_form">
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <h3 class="info-text">1. Informações da Propriedade</h3>
                            <h4 class="obg"> * Campos Obrigatórios </h4>
                            <div class="form">
                                <div class="row">
                                    <div class="input-group col-md-4 col-6">
                                        <label class="meulabel" for="">Proposito</label>
                                        <select class="form-control" name="" id="">
                                            <optgroup>
                                                <option value=""></option>
                                                <option value="">1</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="input-group col-md-4 col-6">
                                        <label class="meulabel" for="">Ilha</label>
                                        <select class="form-control" name="" id="">
                                            <optgroup>
                                                <option value=""></option>
                                                <option value="">1</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="input-group col-md-6 col-lg-4 col-6">
                                                <label class="meulabel" for="">Quartos</label>
                                                <input class="meutypenumber" type="number">
                                            </div>
                                            <div class="input-group col-md-6 col-lg-4 col-6">
                                                <label class="meulabel" for="">Casa banho</label>
                                                <input class="meutypenumber" type="number">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="input-group col-lg-4 col-md-3 col-6">
                                        <label class="meulabel" for="">Tipo Propriedade</label>
                                        <select class="form-control" name="" id="">
                                            <optgroup>
                                                <option value=""></option>
                                                <option value="">1</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="input-group col-lg-4 col-md-3 col-6">
                                        <label class="meulabel" for="">Município</label>
                                        <select class="form-control" name="" id="">
                                            <optgroup>
                                                <option value=""></option>
                                                <option value="">1</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="row">
                                            <div class="input-group col-md-4 col-4">
                                                <label class="meulabel" for="">Sala de estar</label>
                                                <input class="meutypenumber" type="number">
                                            </div>
                                            <div class="input-group col-md-4 col-4">
                                                <label class="meulabel" for="">Cozinha</label>
                                                <input class="meutypenumber" type="number">
                                            </div>
                                            <div class="input-group col-md-4 col-4">
                                                <label class="meulabel" for="">Garragem</label>
                                                <input class="meutypenumber" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="row">
                                            <div class=" input-group col-md-6 col-6">
                                                <label class="meulabel" for="">Area</label>
                                                <input class="meutypenumber" type="text">
                                            </div>
                                            <div class="input-group col-md-6 col-6">
                                                <label class="meulabel" for="">Bairro</label>
                                                <input class="meutypenumber" type="text">
                                            </div>
                                            <div class="input-group col-md-6 col-6">
                                                <label class="meulabel" for="">Preço da propriedade</label>
                                                <input class="meutypenumber" type="text">
                                            </div>
                                            <div class="input-group col-md-6 col-6">
                                                <label class="meulabel" for="">Telefone </label>
                                                <input class="meutypenumber input-group-addon danger" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group col-md-4">
                                        <label class="meulabel" for="">Descrição </label>
                                        <textarea class="col-md-12 meutextarea" name="" id="" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="meucheckbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-md-11">
                                    <p class="normas">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vitae dictum eros.
                                        Quisque semper vel purus eget auctor. Pellentesque ut aliquam ante, in lobortis mauris.
                                        Cras mattis mauris placerat faucibus pulvinar. Sed fringilla, ligula non luctus lacinia
                                    </p>
                                </div>
                            </div>
                            <button type="button" class="next action-button" disabled>Próximo</button>
                        </fieldset>

                        <fieldset>
                            <h3 class="info-text">2. Imagens da Propriedade</h3>

                            <input name="file" type="file" multiple />

                            <button type="button" class="action-button previous previous_button">Voltar</button>
                            <button type="button" class="next action-button">Próximo</button>
                        </fieldset>

                        <fieldset>
                            <h3 class="info-text">3. Preview da publicação</h3>
                            <div class="preview">
                                <img src="images/p2.jpg" class="img-preview img-fluid" alt="">
                                <div class="centered"><img width="80" height="80" src="images/preview.png" alt=""></div>
                            </div>
                            <a href="#" class="action-button">HOME</button>
                                <a href="#" class="action-button">Ir para pagina</a></a>
                        </fieldset>

                        <fieldset>
                            <h3 class="info-text">4. Comfirmação da publicação</h3>
                            <div class="comfirmacao">
                                <img width="100" height="100" src="images/confirmar.png" alt="">
                                <h4 class="text-confirmar"> Publicação confirmada! </h4>
                            </div>
                            <button type="button" class="action-button previous previous_button">Voltar</button>
                            <button type="button" class="next action-button">Próximo</button>
                        </fieldset>

                    </form>
                </section>
                <!-- End Multi step form -->
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