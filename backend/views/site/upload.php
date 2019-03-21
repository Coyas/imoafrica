<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 3/20/19
 * Time: 11:03 AM
 */
use yii\web\View;
?>
<button id="upload_widget" class="cloudinary-button">Carregar Imagens</button>
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>


<?php
//echo Cloudinary::random_public_id();die;
$dono = "vera";
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

