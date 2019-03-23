<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\ProjectCalendar]].
 *
 * @see \frontend\models\ProjectCalendar
 */
class ProjectCalendarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\ProjectCalendar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\ProjectCalendar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
