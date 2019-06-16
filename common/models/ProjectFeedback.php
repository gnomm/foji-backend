<?php

namespace common\models;

use common\models\tables\Project;
use Yii;

/**
 * This is the model class for table "project_feedback".
 *
 * @property int $id
 * @property int $rate
 * @property string $comment
 * @property string $created_at
 * @property int $project_id
 * @property int $user_id
 *
 * @property Project $project
 * @property User $user
 */
class ProjectFeedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rate', 'project_id'], 'required'],
            [['rate', 'project_id', 'user_id'], 'integer'],
            [['comment'], 'string'],
            [['created_at'], 'safe'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate' => 'Rate',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProjectFeedbackQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProjectFeedbackQuery(get_called_class());
    }
}
