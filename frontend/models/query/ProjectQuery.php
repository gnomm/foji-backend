<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Project]].
 *
 * @see \frontend\models\Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\Project[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\Project|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
