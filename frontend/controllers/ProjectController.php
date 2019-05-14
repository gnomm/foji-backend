<?php


namespace frontend\controllers;


use yii\web\Controller;
use common\models\Project;

class ProjectController extends Controller
{
    public function actionIndex($id)
    {
        $project = Project::findOne(['=', 'id', $id]);

        return $this->render('index',
            [
                'project' => $project
            ]);
    }
}