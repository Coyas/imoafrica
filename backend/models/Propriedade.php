<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propriedade".
 *
 * @property int $id
 * @property string $nomePt
 * @property string $nomeEn
 * @property string $nomeFr
 * @property string $ilha
 * @property string $zona
 * @property int $area
 * @property int $preco
 * @property string $proposito
 * @property int $quarto
 * @property int $garragem
 * @property int $banheiro
 * @property int $cozinha
 * @property int $sala
 * @property string $descricaoPt
 * @property string $descricaoEn
 * @property string $descricaoFr
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DonoPropriedade[] $donoPropriedades
 * @property Dono[] $donos
 * @property Imagens[] $imagens
 */
class Propriedade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'propriedade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomePt', 'nomeEn', 'nomeFr', 'ilha', 'zona', 'area', 'preco'], 'required'],
            [['area', 'preco', 'quarto', 'garragem', 'banheiro', 'cozinha', 'sala'], 'integer'],
            [['proposito', 'descricaoPt', 'descricaoEn', 'descricaoFr'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nomePt', 'nomeEn', 'nomeFr', 'ilha', 'zona'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomePt' => 'Nome Pt',
            'nomeEn' => 'Nome En',
            'nomeFr' => 'Nome Fr',
            'ilha' => 'Ilha',
            'zona' => 'Zona',
            'area' => 'Area',
            'preco' => 'Preco',
            'proposito' => 'Proposito',
            'quarto' => 'Quarto',
            'garragem' => 'Garragem',
            'banheiro' => 'Banheiro',
            'cozinha' => 'Cozinha',
            'sala' => 'Sala',
            'descricaoPt' => 'Descricao Pt',
            'descricaoEn' => 'Descricao En',
            'descricaoFr' => 'Descricao Fr',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonoPropriedades()
    {
        return $this->hasMany(DonoPropriedade::className(), ['id_propriedade' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonos()
    {
        return $this->hasMany(Dono::className(), ['id' => 'id_dono'])->viaTable('dono_propriedade', ['id_propriedade' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagens()
    {
        return $this->hasMany(Imagens::className(), ['id_propriedade' => 'id']);
    }
}
