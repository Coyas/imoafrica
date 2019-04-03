<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 4/2/19
 * Time: 11:45 AM
 */

namespace frontend\models;


use yii\base\Model;


/**
 * This is the model class for table "comment".
 *
 * @property int $conselho
 * @property string $zona
 * @property int $tproperty
 * @property int $de
 * @property int $ate
 */


class PesquisaFrom extends model
{
    public $conselho;
    public $zona;
    public $tproperty;
    public $de;
    public $ate;

    public function rules()
    {
        return [
            [['conselho', 'tproperty'], 'required'],
            ['zona', 'string', 'max' => 50],
            [['conselho', 'tproperty'], 'integer'],
            [['de', 'ate'], 'number']
        ];
    }
}