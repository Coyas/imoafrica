<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propriedade".
 *
 * @property int $id
 * @property int $id_conselho
 * @property string $zona
 * @property int $area
 * @property double $preco
 * @property int $proposito
 * @property int $quarto
 * @property int $garragem
 * @property int $banheiro
 * @property int $cozinha
 * @property int $sala
 * @property string $descricaoPt
 * @property string $descricaoEn
 * @property string $descricaoFr
 * @property int $publicar
 * @property int $id_tipo
 * @property int $destaque
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DonoPropriedade[] $donoPropriedades
 * @property Dono[] $donos
 * @property Imagens[] $imagens
 * @property Tipo $tipo
 * @property Conselho $conselho
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
            [['id_conselho', 'area', 'proposito', 'quarto', 'garragem', 'banheiro', 'cozinha', 'sala', 'publicar', 'id_tipo', 'destaque'], 'integer'],
            [['zona', 'area', 'preco', 'id_tipo'], 'required'],
            [['preco'], 'number'],
            [['descricaoPt', 'descricaoEn', 'descricaoFr'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['zona'], 'string', 'max' => 100],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['id_tipo' => 'id']],
            [['id_conselho'], 'exist', 'skipOnError' => true, 'targetClass' => Conselho::className(), 'targetAttribute' => ['id_conselho' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_conselho' => 'Conselho/cidade',
            'zona' => 'Zona',
            'area' => 'Dimensao (Area)',
            'preco' => 'Preco',
            'proposito' => 'Proposito',
            'quarto' => 'Quarto',
            'garragem' => 'Garragem',
            'banheiro' => 'Banheiro',
            'cozinha' => 'Cozinha',
            'sala' => 'Sala',
            'descricaoPt' => 'Descricao (Portugues)',
            'descricaoEn' => 'Descricao (Ingles)',
            'descricaoFr' => 'Descricao (Frances)',
            'publicar' => 'Publicar',
            'id_tipo' => 'Tipo De Propriedade',
            'destaque' => 'Manter em Destaque',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(Tipo::className(), ['id' => 'id_tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConselho()
    {
        return $this->hasOne(Conselho::className(), ['id' => 'id_conselho']);
    }
}
