<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 3/14/19
 * Time: 2:26 PM
 */
use yii\db\Query;
use yii\web\View;
use yii\helpers\Html;
?>


<div class="section">
    <!-- Page Content -->
    <div class="container">
        <div class="arrendar">
            <h1 class="gallery-title">Propriedades a Venda</h1>

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

                    $pasta2 = str_replace(" ", "_", $dono['nome'].$dono['apelido']);
                    ?>
                    <div class="col-md-3 col-sm-6 lthome filter arrendar">
                        <div class="destaques">
                            <!--                                        <img src="images/p2.jpg" class="img-fluid">-->
                            <?= Html::img(Yii::$app->urlManagerB->createUrl(Yii::$app->params['upload'].$pasta2."/".$slide['foto']), ['class' => 'img-fluid imgin'])?>
                            <div class="text-center">
                                <span class="property-box-label property-box-label-primary"><?= $slide['proposito'] == 0 ? "Arrendar" : "A Venda"?></span>
                                <h2 class="txt-nome"> <?= $slide['nomePt'] ?>  </h2>
                                <h3 class="txt-localizacao"> <?=$slide['ilha']?>, <?=$slide['zona']?> </h3>
                                <h3 class="txt-dimensao"> <?= $slide['area']?>m<sup>2</sup> </h3>
                                <h4 class="txt-preco"> <?=$slide['preco']?> $00 </h4>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <ul class="text-center pagination-imo">
                <li><a class=""></a></li>
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
                    <form class="form-inline">
                        <div class="container">
                            <div class="row">
                                <div class="meucol selectmeu">
                                    <div class="input-group mb-2 formmargin">
                                        <select class="meu-select">
                                            <option selected>Ilha</option>
                                            <option value="st">Santo Antão</option>
                                            <option value="sv">São Vicente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <div class="input-group mb-2 formmargin">
                                        <input type="text" class="meu-form" id="" placeholder="Zona">
                                    </div>
                                </div>
                                <div class="meucol selectmeu">
                                    <div class="input-group mb-2 formmargin">
                                        <select class="meu-select">
                                            <option selected>Tipo Propriedade</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <div class="input-group mb-2 formmargin">
                                        <input type="text" class="meu-form" id="" placeholder="Apartir de">
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" class="meu-form" id="" placeholder="Até">
                                    </div>
                                </div>
                                <div class="meucol inputmeu">
                                    <button type="submit" class="meubotao mb-2"> Filtrar propriedade</button>
                                </div>

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
