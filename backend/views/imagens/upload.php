<?php
/**
 * Created by iMedia.
 * User: coyas
 * Date: 3/21/19
 * Time: 12:31 PM
 */

use yii\helpers\Html;
use yii\web\View;

?>

<?= \kato\DropZone::widget([
    'options' => [
        'url' => 'index.php?r=imagens/upload&id='.$id,
        'maxFilesize' => '10',
    ],
    'clientEvents' => [
        'complete' => "function(file){console.log(file)}",
        'removedfile' => "function(file){alert(file.name + ' is removed')}"
    ],
]);

?>
<div class="margin-T-2">

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-5">
            <?= Html::a('Confirmar', ['propriedade/view', 'id' => $id], ['class' => 'btn btn-warning']) ?>
        </div>
    </div>
</div>
