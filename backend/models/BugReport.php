<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bugReport".
 *
 * @property int $id
 * @property string $autor
 * @property string $tipo
 * @property int $visto
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 */
class BugReport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bugReport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'body'], 'string'],
            [['visto'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['autor'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'autor' => 'Autor',
            'tipo' => 'Tipo',
            'visto' => 'Visto',
            'body' => 'Body',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
        ];
    }
}
