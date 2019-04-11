<?php

namespace frontend\controllers;

use common\models\ProjectFilter;
use yii\filters\Cors;
use yii\rest\ActiveController;

class ProjectController extends ActiveController
{
    public $modelClass = 'common\models\Project';

    // Кросс-доменные запросы  УДАЛИТЬ НА ПРОДАКШЕНЕ!
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        // отключить действия "delete" и "create"
        //unset($actions['delete'], $actions['create']);

        // настроить подготовку провайдера данных с помощью метода "prepareDataProvider()"
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $searchModel = new ProjectFilter();
        return $searchModel->search(\Yii::$app->request->queryParams);
    }
}