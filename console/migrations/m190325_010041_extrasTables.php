<?php

use yii\db\Migration;

/**
 * Class m190325_010041_extrasTables
 */
class m190325_010041_extrasTables extends Migration
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

        $this->createTable('notes', [
            'id' => $this->primaryKey(),
            'title' => $this->integer()->notNull(),
            'message' => $this->text(),
            'importancia' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);

        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'title' => $this->integer()->notNull(),
            'message' => $this->text(),
            'importancia' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('notes');
        $this->dropTable('tasks');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190325_010041_extrasTables cannot be reverted.\n";

        return false;
    }
    */
}
