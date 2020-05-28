<?php
namespace backend\controllers;

use Yii;
use yii\authclient\OAuth2;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\ThridForm;

/**
 * Site controller
 */
class LoginController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this,'onAuthSuccess']
            ]
        ];
    }

    public function onAuthSuccess(OAuth2 $client)
    {
        $attributes = $client->getUserAttributes();

        $model = new ThridForm();
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('index');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
