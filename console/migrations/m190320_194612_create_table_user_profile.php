<?php

use yii\db\Migration;

/**
 * Class m190320_194612_create_table_user_profile
 */
class m190320_194612_create_table_user_profile extends Migration
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

        $this->createTable('user_profile', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20),
            'surname' => $this->string(20),
            'phone' => $this->string(20),
            'phone_status' => $this->tinyInteger()->defaultValue(0),
            'birthday' => $this->date(),
            'info' => $this->text(),
            'sex' => $this->tinyInteger(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-user_profile-user_id-user-id',
            'user_profile',
            'user_id'
        );

        $this->addForeignKey(
            'fk-user_profile-user_id-user-id',
            'user_profile',
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
       $this->dropTable('user_profile');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190320_194612_create_table_user_profile cannot be reverted.\n";

        return false;
    }
    */
}
