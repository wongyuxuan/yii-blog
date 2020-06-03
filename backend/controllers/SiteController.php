<?php


namespace backend\controllers;


use yii\filters\AccessControl;
use yii\web\Controller;

class SiteController extends Controller
{
    public function behaviors()
    {
       return [
           'access' => [
               'class' => AccessControl::className(),
               'only' => ['index','welcome'],
               'rules' => [
                   // 允许认证用户
                   [
                       'allow' => false,
                       'actions' => ['index'],
                       'roles' => ['@'],
                   ],
               ]
           ]
       ];
    }

    public function actions()
    {
       return [
           'error' => [
               'class' => 'yii\web\ErrorAction',
           ],
       ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    /**
     * Displays welcome
     *
     * @return string
     */
    public function actionWelcome()
    {
        return $this->render('welcome');
    }
}