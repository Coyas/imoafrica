<?php

use yii\db\Migration;

/**
 * Class m190320_110719_DataBaseIMO
 */
class m190320_110719_DataBaseIMO extends Migration
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

        $this->createTable('junte', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
            'email' => $this->string(200)->notNull(),
            'assunto' => $this->string(255)->notNull(),
            'morada' => $this->string(255)->notNull(),
            'telefone' => $this->string(50)->notNull(),
            'content' => $this->text()->notNull(),
            'anexo' => $this->string(255),
        ]);

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

        $this->createTable('contatos', [
            'id' => $this->primaryKey(),
            'contato' => $this->integer()->notNull(),
            'localizacao' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('tipo', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(80)->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

//        proposito:
//            0 - arrendar
//            1 - vender
        $this->createTable('propriedade', [
            'id' => $this->primaryKey(),
            'nomePt' => $this->string(50)->notNull(),
            'nomeEn' => $this->string(50)->notNull(),
            'nomeFr' => $this->string(50)->notNull(),
            'ilha' => $this->string(50)->notNull(),
            'zona' => $this->string(50)->notNull(),
            'area' => $this->integer()->notNull(),
            'preco' => $this->double(2)->notNull(),
            'proposito' => "ENUM('0','1')",
//            numero de compartimentos
            'quarto' => $this->integer()->defaultValue(0),
            'garragem' => $this->integer()->defaultValue(0),
            'banheiro' => $this->integer()->defaultValue(0),
            'cozinha' => $this->integer()->defaultValue(0),
            'sala' => $this->integer()->defaultValue(0),
            'descricaoPt' => $this->text(),
            'descricaoEn' => $this->text(),
            'descricaoFr' => $this->text(),
            'publicar' => $this->integer()->defaultValue(0),
            'id_tipo' => $this->integer()->notNull(),
            'destaque' => $this->integer()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('dono', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(20)->notNull(),
            'apelido' => $this->string(100)->notNull(),
            'contato' => $this->integer()->notNull(),
            'endereco' => $this->string(100)->notNull(),
            'email' => $this->string(100)->unique(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->createTable('dono_propriedade', [
            'id_dono' => $this->integer()->notNull(),
            'id_propriedade' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);


        $this->addPrimaryKey('PKDonoPro', 'dono_propriedade', ['id_dono', 'id_propriedade']);
        $this->addForeignKey('FKDonoPro', 'dono_propriedade', 'id_dono', 'dono', 'id');
        $this->addForeignKey('FKDonoPro2', 'dono_propriedade', 'id_propriedade', 'propriedade', 'id');
        $this->addForeignKey('FKTipo', 'propriedade', 'id_tipo', 'tipo', 'id');


        $this->createTable('imagens', [
            'id' => $this->primaryKey(),
            'foto' => $this->text()->notNull(),
            'capa' => $this->integer()->defaultValue(0),
            'id_propriedade' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ], $tableOptions);

        $this->addForeignKey('FKimagem', 'imagens', 'id_propriedade', 'propriedade', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FKimagem', 'imagens');
        $this->dropForeignKey('FKTipo', 'propriedade');
        $this->dropForeignKey('FKDonoPro', 'dono_propriedade');
        $this->dropForeignKey('FKDonoPro2', 'dono_propriedade');
        $this->dropPrimaryKey('PKDonoPro', 'dono_propriedade');



        $this->dropTable('junte');
        $this->dropTable('contatos');
        $this->dropTable('tipo');
        $this->dropTable('propriedade');
        $this->dropTable('dono');
        $this->dropTable('dono_propriedade');
        $this->dropTable('imagens');
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
        echo "m190320_110719_DataBaseIMO cannot be reverted.\n";

        return false;
    }
    */
}
