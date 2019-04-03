<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 3/14/19
 * Time: 2:25 PM
 */

use yii\db\Query;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;


use app\models\Conselho;
use app\models\Tipo;
use yii\widgets\ActiveForm;
?>
<div class="section">
    <!-- Page Content -->
    <div class="container">
        <div class="arrendar">
            <h1 class="gallery-title"><?=Yii::t('app', 'Propriedades Para Arrendar')?></h1>

            <div class="row">
                <?php foreach ($slides as $slide){
                    //        select d.nome, d.apelido from dono d left join dono_propriedade dp on d.id = dp.id_dono left join propriedade p on dp.id_propriedade = p.id where p.id = 1;
                    $dono = (new Query())
                        ->select('d.nome, d.apelido')
                        ->from('dono d')
                        ->leftJoin('dono_propriedade dp', 'd.id = dp.id_dono')
                        ->leftJoin('propriedade p', 'dp.id_propriedade = p.id')
                        ->where(['p.id' => $slide['id']])
                        ->One();

                    $pasta = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
                    ?>

                    <div class="col-md-3 col-sm-6 lthome filter arrendar">
                        <a id="slides" href="<?=Url::to(['site/detalhes', 'id' => $slide['id']])?>">
                            <div class="destaques">
                                <!--                                        <img src="images/p2.jpg" class="img-fluid">-->
                                <?= Html::img(Url::to(Yii::$app->params['image'].$pasta."/".$slide['foto'], true), ['class' => 'img-fluid imgin'])?>
                                <div class="text-center">
                                    <span class="property-box-label property-box-label-primary"><?php if($slide['proposito'] == 1){ echo Yii::t('app', 'Arrendar');}elseif ($slide['proposito'] == 2){ echo Yii::t('app', 'A Venda');}?></span>
                                    <h2 class="txt-nome"> <?= $slide['tipo'] ?>  </h2>
                                    <h3 class="txt-localizacao"> <?=$slide['conselho']?>, <?=$slide['zona']?> </h3>
                                    <h3 class="txt-dimensao"> <?= $slide['area']?>m<sup>2</sup> </h3>
                                    <h4 class="txt-preco"> <?=$slide['preco']?> $00 </h4>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php } ?>
            </div>

            <ul class="text-center pagination-imo">
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">10</a></li>
            </ul>

            <div class="formpesquisatodo">
                <div class="">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'pesquisa-from',
                        'options' => ['class' => 'form-inline'],
                    ]);
                    ?>
<!--                    <form class="form-inline">-->
                        <div class="container">
                            <div class="row">
                                <div class="meucol selectmeu">
                                    <div class="input-group mb-2 formmargin">
                                        <?= $form->field($pesquisa, 'conselho')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(Conselho::find()->All(), 'id', 'nome'),
                                            ['prompt' => Yii::t('app', 'Conselho'), 'class' => 'meu-select']
                                        )->label(false)?>
<!--                                        <select class="meu-select">-->
<!--                                            <option selected>=Yii::t('app', 'Conselho')?></option>-->
<!--                                            <option value="st">Praia</option>-->
<!--                                            <option value="sv">Assomada</option>-->
<!--                                            <option value="sv">S.l. Orgaos</option>-->
<!--                                            <option value="sv">Picos</option>-->
<!--                                            <option value="sv">Calheta</option>-->
<!--                                            <option value="sv">Tarrafal</option>-->
<!--                                            <option value="sv">Cidade Velha</option>-->
<!--                                            <option value="sv">Ribeira da Barca</option>-->
<!--                                            <option value="sv">Sao Domingos</option>-->
<!--                                        </select>-->
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <div class="input-group mb-2 formmargin">
<!--                                        <input type="text" class="meu-form" id="" placeholder="< Yii::t('app', 'Zona')?>">-->
                                        <?= $form->field($pesquisa, 'zona')->textInput(['class' => 'meu-form', 'placeholder' => Yii::t('app', 'Zona')])->label(false) ?>
                                    </div>
                                </div>
                                <div class="meucol selectmeu">
                                    <div class="input-group mb-2 formmargin">
                                        <?= $form->field($pesquisa, 'tproperty')->dropDownList(
                                            \yii\helpers\ArrayHelper::map(Tipo::find()->All(), 'id', 'nome'),
                                            ['prompt' => Yii::t('app', Yii::t('app', 'Tipo Propriedade')), 'class' => 'meu-select']
                                        )->label(false)?>
<!--                                        <select class="meu-select">-->
<!--                                            <option selected>< Yii::t('app', 'Tipo Propriedade')?></option>-->
<!--                                            <option value="1">Apartamento T1</option>-->
<!--                                            <option value="1">Apartamento T2</option>-->
<!--                                            <option value="1">Apartamento T3</option>-->
<!--                                            <option value="2">Terreno + Casa</option>-->
<!--                                            <option value="3">Aeroporto Privado</option>-->
<!--                                        </select>-->
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <div class="input-group mb-2 formmargin">
<!--                                        <input type="text" class="meu-form" id="" placeholder="--//=Yii::t('app', 'Apartir de')?>--">-->
                                        <?= $form->field($pesquisa, 'de')->textInput(['class' => 'meu-form', 'placeholder' => Yii::t('app', 'Apartir de')])->label(false) ?>
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <div class="input-group mb-2 mr-sm-2">
<!--                                        <input type="text" class="meu-form" id="" placeholder="<Yii::t('app', 'Até')?>">-->
                                        <?= $form->field($pesquisa, 'ate')->textInput(['class' => 'meu-form', 'placeholder' => Yii::t('app', 'Até')])->label(false) ?>
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
<!--                                    <button type="submit" class="meubotao mb-2"> Yii::t('app', 'Filtrar propriedade')?></button>-->
                                    <?= Html::submitButton(Yii::t('app', 'Filtrar propriedade'), ['class' => 'meubotao mb-2']) ?>
                                </div>

                            </div>
                        </div>
<!--                    </form>-->
                    <?php ActiveForm::end() ?>
                </div>
            </div>


        </div>
    </div>

</div>


<?php
$this->registerJs(
    "$(\"#banner\").show();",
    View::POS_READY,
    'shownaves'
);
?>

