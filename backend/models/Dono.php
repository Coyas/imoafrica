<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dono".
 *
 * @property int $id
 * @property string $nome
 * @property string $apelido
 * @property int $contato
 * @property string $endereco
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DonoPropriedade[] $donoPropriedades
 * @property Propriedade[] $propriedades
 */
class Dono extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dono';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'apelido', 'contato', 'endereco'], 'required'],
            [['contato'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome'], 'string', 'max' => 20],
            [['apelido', 'endereco', 'email'], 'string', 'max' => 100],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'apelido' => 'Apelido',
            'contato' => 'Contato',
            'endereco' => 'Endereco',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonoPropriedades()
    {
        return $this->hasMany(DonoPropriedade::className(), ['id_dono' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropriedades()
    {
        return $this->hasMany(Propriedade::className(), ['id' => 'id_propriedade'])->viaTable('dono_propriedade', ['id_dono' => 'id']);
    }
}
