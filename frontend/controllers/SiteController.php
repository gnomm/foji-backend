<?php
namespace frontend\controllers;


use common\models\UserProfile;
use Yii;
use yii\filters\Cors;
use yii\rest\Controller;
use frontend\models\LoginForm;
use frontend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

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

    public function actionUserIdentity()
    {
        if ($_user = Yii::$app->user->identity) {
            $userProfile = UserProfile::findOne(['user_id' => $_user['id']]);
        }else {
            return null;
        }

        return [
            'id' => $_user['id'],
            'firstName' => $userProfile['firstName'],
            'lastName' => $userProfile['lastName'],
            'avatar_url' => $userProfile['avatar_url'],
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
