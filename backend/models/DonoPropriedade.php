<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dono_propriedade".
 *
 * @property int $id_dono
 * @property int $id_propriedade
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Dono $dono
 * @property Propriedade $propriedade
 */
class DonoPropriedade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dono_propriedade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dono', 'id_propriedade'], 'required'],
            [['id_dono', 'id_propriedade'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_dono', 'id_propriedade'], 'unique', 'targetAttribute' => ['id_dono', 'id_propriedade']],
            [['id_dono'], 'exist', 'skipOnError' => true, 'targetClass' => Dono::className(), 'targetAttribute' => ['id_dono' => 'id']],
            [['id_propriedade'], 'exist', 'skipOnError' => true, 'targetClass' => Propriedade::className(), 'targetAttribute' => ['id_propriedade' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dono' => 'Id Dono',
            'id_propriedade' => 'Id Propriedade',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDono()
    {
        return $this->hasOne(Dono::className(), ['id' => 'id_dono']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropriedade()
    {
        return $this->hasOne(Propriedade::className(), ['id' => 'id_propriedade']);
    }
}
