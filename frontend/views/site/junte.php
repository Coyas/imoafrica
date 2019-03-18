<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 3/14/19
 * Time: 2:27 PM
 */
use yii\web\View;
?>
<div class="section">
    <div class="container-fluid">
        <h1 class="gallery-title">Junte-se a nós</h1>

        <div class="row">
            <div class="imgjuntese col-md-8 mh-100 p-0">
            </div>
            <div class=" col-md-4 mh-100 p-0">
                <div class="fomrjuntese">
                    <form action="">
                        <div class="row">
                            <div class="input-group col-md-12">
                                <input class="inputcontato" name="" type="text" placeholder="Nome">
                            </div>
                            <div class="input-group col-md-12">
                                <input class="inputcontato" name="" type="email" placeholder="E-mail">
                            </div>
                            <div class="input-group col-md-12">
                                <input class="inputcontato" name="" type="text" placeholder="Telefone">
                            </div>
                            <div class="input-group col-md-12">
                                <input class="inputcontato" name="" type="text" placeholder="Morada">
                            </div>
                            <div class="input-group col-md-12">
                                <textarea class="col-md-12 meutextareac" name="" id="" rows="4" placeholder="Mensagem"></textarea>
                            </div>
                            <div class="selectcur col-md-6 col-sm-6">
                                <p>Curriculum Vitae</p>
                                <input type="file" name="file" id="file" class="inputfile" />
                                <label for="file">Selecione ficheiro</label>
                                <p class="small">pdf .doc .docx</p>
                            </div>
                            <div class="input-group col-md-6 col-sm-6">
                                <input class="meubotaocontatoj pull-left" name="" value="Enviar" id="" type="submit">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$this->registerJs(
    "$(\"#banner\").show();",
    View::POS_READY,
    'shownave'
);
?>