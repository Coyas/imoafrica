<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resposta".
 *
 * @property int $id
 * @property string $email
 * @property string $content
 * @property int $publicar
 * @property int $id_comment
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Comment $comment
 */
class Resposta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resposta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'content'], 'required'],
            [['content'], 'string'],
            [['publicar', 'id_comment'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 200],
            [['id_comment'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['id_comment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'content' => 'Content',
            'publicar' => 'Publicar',
            'id_comment' => 'Id Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'id_comment']);
    }
}
