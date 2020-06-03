<?php
namespace backend\controllers;

use common\models\User;
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
                'successCallback' => [$this,'actionCallback']
            ]
        ];
    }

    public function actionCallback(OAuth2 $client)
    {
        $attributes = $client->getUserAttributes();

        //qq登录成功设置session
        $session = Yii::$app->session;
        if(array_key_exists('openid',$attributes))  $session->set('openid',$attributes['openid']);

        return $this->render('callback');

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
        //判断session是否存在openid
        $session = Yii::$app->session;
        if(!$session->has('openid'))
        {
            $data['tip'] = 0;
            $data['error'] = '';
            return $this->render('index',$data);
        }

        $openid = $session->get('openid');
        $atttibutes['openid'] = $openid;

        $model = new ThridForm();
        $model->scenario = $model::SCENARIO_LOGIN;

        //登录
        if($model->load($atttibutes,'') && $model->login()){
            $this->redirect('/site/index');
        }else{
            $data['tip'] = 1;
            $data['error'] = $model->getFirstError('openid');
            return  $this->render('index',$data);
        }

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
