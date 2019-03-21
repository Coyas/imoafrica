<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagens".
 *
 * @property int $id
 * @property string $link
 * @property int $id_propriedade
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Propriedade $propriedade
 */
class Imagens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link', 'id_propriedade'], 'required'],
            [['link'], 'string'],
            [['id_propriedade'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_propriedade'], 'exist', 'skipOnError' => true, 'targetClass' => Propriedade::className(), 'targetAttribute' => ['id_propriedade' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'id_propriedade' => 'Id Propriedade',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropriedade()
    {
        return $this->hasOne(Propriedade::className(), ['id' => 'id_propriedade']);
    }
}
