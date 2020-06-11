<?php


namespace backend\controllers;

use Yii;
use yii\web\Controller;

class UserController extends Controller
{
    /**
     * 用户列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }
}