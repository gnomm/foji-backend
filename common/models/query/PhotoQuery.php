<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\tables\UploadPhoto]].
 *
 * @see \common\models\tables\UploadPhoto
 */
class PhotoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\tables\UploadPhoto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\tables\UploadPhoto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
