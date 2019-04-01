<?php
namespace frontend\controllers;


use common\models\Project;
use common\models\query\ProjectQuery;
use common\models\query\UserProfileQuery;
use common\models\User;
use common\models\UserProfile;
use Yii;
use yii\rest\Controller;
use frontend\models\LoginForm;
use frontend\models\SignupForm;

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
//        return Yii::$app->user->identity;
        if (Yii::$app->user->isGuest)
        {
            $_user = 'guest';
        }else {
            $_user = Yii::$app->user->identity;
            $userProfile = UserProfile::findOne(['user_id' => $_user['id']]);

        }

        $projects = Project::find()->immediate(6);

        return [
            'id' => $_user['id'],
            'firstName' => $userProfile['firstName'],
            'lastName' => $userProfile['lastName'],
            'city' => $userProfile['city'],
            'avatar_url' => $userProfile['avatar_url'],
            'Projects_on_index' => $projects,
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
