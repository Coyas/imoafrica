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
    <div  class="section fp-auto-height">
        <div id="cabe" class="container-fluid">
            <h1 class="gallery-title"> </h1>
        </div>
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
<!--                    <form action="">-->
                        <div class="row">
                            <div class="input-group col-md-12">
                                <?= $form->field($junte, 'nome')->textInput(['maxlength' => true, 'placeholder' => 'Nome', 'class' => 'inputcontato'])->label(false) ?>
<!--                                <input class="inputcontato" name="" type="text" placeholder="Nome">-->
                            </div>
                            <div class="input-group col-md-12">
<!--                                <input class="inputcontato" name="" type="email" placeholder="E-mail">-->
                                <?= $form->field($junte, 'email')->textInput(['maxlength' => true, 'placeholder' => 'E-mail', 'class' => 'inputcontato'])->label(false) ?>
                            </div>
                            <div class="input-group col-md-12">
<!--                                <input class="inputcontato" name="" type="text" placeholder="Telefone">-->
                                <?= $form->field($junte, 'telefone')->textInput(['maxlength' => true, 'placeholder' => 'Telefone', 'class' => 'inputcontato'])->label(false) ?>
                            </div>
                            <div class="input-group col-md-12">
<!--                                <input class="inputcontato" name="" type="text" placeholder="Morada">-->
                                <?= $form->field($junte, 'morada')->textInput(['maxlength' => true, 'placeholder' => 'Morada', 'class' => 'inputcontato'])->label(false) ?>
                            </div>
                            <div class="input-group col-md-12">
<!--                                <textarea class="col-md-12 meutextareac" name="" id="" rows="4" placeholder="Mensagem"></textarea>-->
                                <?= $form->field($junte, 'content')->textarea(['rows' => 4, 'placeholder' => 'Mensagem', 'class' => 'col-md-12 meutextareac'])->label(false) ?>
                            </div>
                            <div class="selectcur col-md-6 col-sm-6">
                                <p>Curriculum Vitae</p>
                                <?= $form->field($junte, 'anexo')->fileInput(['maxlength' => true, 'class' => 'inputfi'])->label(false) ?>
<!--                                <input type="file" name="file" id="file" class="inputfile" />-->
<!--                                <label for="file">Selecione ficheiro</label>-->
                                <p class="small">pdf .doc .docx</p>
                            </div>
                            <div class="input-group col-md-6 col-sm-6">
<!--                                <input class="meubotaocontatoj pull-left" name="" value="Enviar" id="" type="submit">-->
                                <?= Html::submitButton('Enviar', ['class' => 'meubotaocontatoj pull-left']) ?>
                            </div>

                        </div>
<!--                    </form>-->
                    <?php ActiveForm::end(); ?>
                </div>
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