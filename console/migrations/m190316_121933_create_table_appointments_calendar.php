<?php

use yii\db\Migration;

/**
 * Class m190316_121933_create_table_appointments_calendar
 */
class m190316_121933_create_table_appointments_calendar extends Migration
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

        $this->createTable('project_calendar', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(20),
            'customer_comment' => $this->string(),
            'organizer_comment' => $this->string(),
            'status' => 'ENUM("new", "accepted", "rejected") NOT NULL DEFAULT "new"',
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'project_id' => $this->integer()->notNull(),
            'project_user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-project-id__project_calendar-project_id',
            'project_calendar',
            'project_id'
        );

        $this->addForeignKey(
            'fk-project-id__project_calendar-project_id',
            'project_calendar',
            'project_id',
            'project',
            'id',
            'CASCADE',
            'RESTRICT'
        );

        $this->createIndex(
            'idx-project-user_id__project_calendar-project_user_id',
            'project_calendar',
            'project_user_id'
        );

        $this->addForeignKey(
            'fk-project-user_id__project_calendar-project_user_id',
            'project_calendar',
            'project_user_id',
            'project',
            'user_id',
            'CASCADE',
            'RESTRICT'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project_calendar');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190316_121933_create_table_appointments_calendar cannot be reverted.\n";

        return false;
    }
    */
}
