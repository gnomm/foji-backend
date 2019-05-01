<?php

use yii\db\Migration;

/**
 * Class m190408_182428_add_to_project_columns_accessories_and_studio
 */
class m190408_182428_add_to_project_columns_accessories_and_studio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'project',
            'accessories',
            $this->tinyInteger()->after('costume')
        );

        $this->addColumn(
            'project',
            'studio',
            $this->tinyInteger()->after('accessories')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('project','accessories');
        $this->dropColumn('project','studio');
    }

}
