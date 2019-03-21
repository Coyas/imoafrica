<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contatos".
 *
 * @property int $id
 * @property int $contato
 * @property string $localizacao
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 */
class Contatos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contatos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['contato', 'localizacao', 'email'], 'required'],
            [['contato'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['localizacao', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contato' => 'Contato',
            'localizacao' => 'Localizacao',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
