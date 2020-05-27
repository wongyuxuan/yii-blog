<?php


namespace backend\controllers;


use yii\web\Controller;

class SiteController extends Controller
{
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