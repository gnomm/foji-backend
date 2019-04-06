<?php

namespace frontend\controllers;


use common\models\Project;
use yii\data\ActiveDataProvider;
use yii\filters\Cors;
use yii\rest\ActiveController;

class ProjectController extends ActiveController
{
    public $modelClass = 'common\models\Project';

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
         $query = Project::find();
         $dataProvider = new ActiveDataProvider([
              'query' => $query,
              'pagination' => [
                 'pageSize' => 8,
              ],
              'sort' => [
                  'defaultOrder' => [
                     'date_start' => SORT_ASC,
                  ]
              ],
         ]);
        $query->immediate(1000);
        return $dataProvider;
    }
}