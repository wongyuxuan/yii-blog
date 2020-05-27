<?php
/**
 * Created by PhpStorm.
 * User: huaji001
 * Date: 2019/3/7
 * Time: 1:39 PM
 */

namespace frontend\controllers;


use frontend\events\LogEvent;
use frontend\events\SmsEvent;
use yii\base\Controller;
use yii\base\Event;

class TestController extends Controller
{
    public function actionTest(){
        $logEvent = new LogEvent();
        Event::on(SmsEvent::className(),'login',[$logEvent,'log']);
        return (new SmsEvent())->sendSms();
    }
}