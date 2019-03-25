<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $title
 * @property string $message
 * @property int $importancia
 * @property string $created_at
 * @property string $updated_at
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'importancia'], 'required'],
            [['title', 'importancia'], 'integer'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'message' => 'Message',
            'importancia' => 'Importancia',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
