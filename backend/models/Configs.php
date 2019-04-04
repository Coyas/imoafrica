<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configs".
 *
 * @property int $id
 * @property string $config
 * @property string $valor
 * @property string $created_at
 * @property string $updated_at
 */
class Configs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['config', 'valor'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['config', 'valor'], 'string', 'max' => 50],
            [['config'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'config' => 'Config',
            'valor' => 'Valor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
