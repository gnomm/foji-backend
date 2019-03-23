<?php

use yii\db\Migration;

/**
 * Class m190316_121809_create_table_user
 */
class m190316_121809_create_table_user extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(30)->notNull()->unique(),
            'role' => 'ENUM("admin", "model", "organizer", "photographer") NOT NULL DEFAULT "model"',
            'status' => $this->tinyInteger()->defaultValue(1),
            'password' => $this->string()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190316_121809_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
