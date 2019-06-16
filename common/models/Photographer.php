<?php

namespace common\models;

use Yii;
use common\models\tables\Project;

/**
 * This is the model class for table "photographer".
 *
 * @property int $id
 * @property string $name
 * @property string $info
 *
 * @property Project[] $projects
 */
class Photographer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photographer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['info'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PhotographerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PhotographerQuery(get_called_class());
    }
}
