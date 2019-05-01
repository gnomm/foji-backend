<?php

use yii\db\Migration;

/**
 * Class m190316_121809_create_table_user
 */
class m190316_121809_create_table_user extends Migration
{

    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(50)->notNull()->unique(),
            'role' => 'ENUM("admin", "model", "organizer", "photographer") NOT NULL DEFAULT "model"',
            'status' => $this->tinyInteger()->defaultValue(1),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return true;
    }

}
