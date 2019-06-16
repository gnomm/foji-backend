<?php

namespace common\models\tables;

use Yii;
use common\models\tables\Project;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property int $project_id
 * @property string $image
 * @property int $active_photo
 * @property int $main_photo
 * @property string $created_at
 *
 * @property Project $project
 */
class UploadPhoto extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['project_id', 'active_photo', 'main_photo'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, jpeg, png'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'image' => 'Image',
            'active_photo' => 'Active Photo',
            'main_photo' => 'Main Photo',
            'created_at' => 'Created At',
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
     * {@inheritdoc}
     * @return \common\models\query\PhotoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PhotoQuery(get_called_class());
    }


    public function uploadFile(UploadedFile $file){
        $this->image = $file;

        $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
        $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $filename);

        return $filename;
    }

    public function saveImage($filename){
        $this->image = $filename;
        $this ->save(false);
    }


}
