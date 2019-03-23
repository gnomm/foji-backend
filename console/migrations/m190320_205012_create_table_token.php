<?php

use yii\db\Migration;

/**
 * Class m190320_205012_create_table_token
 */
class m190320_205012_create_table_token extends Migration
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

        $this->createTable('user_token', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'token' => $this->string()->notNull()->unique(),
            'expired_at' => $this->integer()->notNull()
        ], $tableOptions);

        $this->createIndex(
            'idx-user-id__user_token-user_id',
            'user_token',
            'user_id'
        );

        $this->addForeignKey(
            'fk-user-id__user_token-user_id',
            'user_token',
            'user_id',
            'user',
            'id',
            'CASCADE',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_token');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190320_205012_create_table_token cannot be reverted.\n";

        return false;
    }
    */
}
