<?php

namespace common\models\query;


/**
 * This is the ActiveQuery class for [[\common\models\Project]].
 *
 * @see \common\models\Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    public function immediate($limit)
    {
        return $this->where(['status' => 'published'])
                    ->limit($limit)
                    ->all();
    }

    public function forUser($userId)
    {
        return $this->andWhere(['user_id' => $userId]);
    }

    public function latest($limit)
    {
        return $this->limit($limit)->orderBy(['id' => SORT_DESC,]);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Project[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Project|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
