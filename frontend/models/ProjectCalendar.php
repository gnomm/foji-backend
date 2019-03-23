<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "project_calendar".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $customer_comment
 * @property string $organizer_comment
 * @property string $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $project_id
 * @property int $project_user_id
 *
 * @property Project $project
 * @property Project $projectUser
 */
class ProjectCalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'string'],
            [['created_at', 'updated_at', 'project_id', 'project_user_id'], 'integer'],
            [['project_id', 'project_user_id'], 'required'],
            [['name', 'customer_comment', 'organizer_comment'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['project_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_user_id' => 'user_id']],
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
            'phone' => 'Phone',
            'customer_comment' => 'Customer Comment',
            'organizer_comment' => 'Organizer Comment',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'project_id' => 'Project ID',
            'project_user_id' => 'Project User ID',
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
    public function getProjectUser()
    {
        return $this->hasOne(Project::className(), ['user_id' => 'project_user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\ProjectCalendarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ProjectCalendarQuery(get_called_class());
    }
}
