<?php
namespace frontend\controllers;


use Yii;
use yii\rest\Controller;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use yii\web\Request;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return [
            'test' => 'test',
        ];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $model = new Loginform();
        if ($model->load(Yii::$app->request->bodyParams, '') && $model->login()) {
            return true;
        } else {
            return $model->getErrors();
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return 'ok';
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ( $model->load(Yii::$app->request->bodyParams, '') && $model->signup()) {
            return true;
        } else {
            return $model->getErrors();
        }
    }

    protected function verbs()
    {
        return [
            'login' => ['post'],
            'signup' => ['post'],
        ];
    }

}
