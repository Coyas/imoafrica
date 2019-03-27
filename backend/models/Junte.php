<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "junte".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $assunto
 * @property string $morada
 * @property string $telefone
 * @property string $content
 * @property string $anexo
 */
class Junte extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'junte';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'assunto', 'morada', 'telefone', 'content', 'anexo'], 'required'],
            [['content'], 'string'],
            [['nome'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 200],
            [['assunto', 'morada', 'anexo'], 'string', 'max' => 255],
            [['telefone'], 'string', 'max' => 50],
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
            'email' => 'Email',
            'assunto' => 'Assunto',
            'morada' => 'Morada',
            'telefone' => 'Telefone',
            'content' => 'Content',
            'anexo' => 'Anexo',
        ];
    }
}