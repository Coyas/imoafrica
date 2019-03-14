<?php

use yii\db\Migration;

/**
 * Class m190301_131755_bugReport
 */
class m190301_131755_bugReport extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

//        enum: 0 => reportar problema,
//        enum: 1 => Sugerir alteração,
//        enum: 2 => Sugerir Nova funcionalidade,

        $this->createTable('bugReport', [
            'id' => $this->primaryKey(),
            'autor' => $this->string(50),
            'tipo' => "ENUM('0','1','2')",
            'visto' => $this->integer()->defaultValue(0),
            'body' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('bugReport');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190301_131755_bugReport cannot be reverted.\n";

        return false;
    }
    */
}
