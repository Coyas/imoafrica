<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Imagens */

$this->title = 'Adicionar Imagens';
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagens-create">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">


            <?php
            //    $this->render('_form', [
            //        'model' => $model,
            //    ])
//            echo "id: ".$id;
            ?>

            <button id="upload_widget" class="cloudinary-button">Carregar Imagens</button>
            <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>


            <?php
            //echo Cloudinary::random_public_id();die;

            //    echo $dono;
            //$assinatura = sha1($payload_to_sign . '2yxRMRhlxO1LQ8xY2n6NO2x7blQ');
            //$params_to_sign = {:public_id: "sample", version: "1312461204"};
            //$params_to_sign = array(
            //    "public_id" => "imovel",
            //    "version" => Cloudinary::random_public_id(),
            //);
            //$assinatura = Cloudinary::api_sign_request($params_to_sign, "2yxRMRhlxO1LQ8xY2n6NO2x7blQ");
            //if($assinatura){
            $this->registerJs(
                "var myWidget = cloudinary.createUploadWidget({
        cloudName: 'imoafrica',
        uploadPreset: 'imovelF',
//        apiKey: '855424493243825',
//        uploadSignature: assinatura',
        folder: '$dono',
        multiple: true,
        sources: ['local', 'url', 'camera', 'image_search']
        }, (error, result) => { console.log(error, result) })
        
        document.getElementById(\"upload_widget\").addEventListener(\"click\", function(){
        myWidget.open();
       }, false);
       ",
                View::POS_READY,
                'upload'
            );
            //}else{
            //    echo "erro no Cloudinary::api_sign_request";
            //}

            ?>
        </div>
    </div>
</div>

</div>
