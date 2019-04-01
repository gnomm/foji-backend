<?php

namespace common\models\query;

use yii\db\Query;

/**
 * This is the ActiveQuery class for [[\common\models\Project]].
 *
 * @see \common\models\Project
 */
class ProjectQuery extends \yii\db\ActiveQuery
{
    public function immediate($limit)
    {
        return $this->select([
            'id',
            'name',
            'theme',
            'location',
            'how_to_get',
            'date_start',
            'date_end',
            'time_start',
            'time_end',
            'duration',
            'qty_photos',
            'path_images',
            'makeup',
            'hairstyle',
            'costume',
            'prepayment',
            'payment_method',
            'price',
            ])
            ->where('date_start >= now()')
            ->orderBy('date_start')
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
