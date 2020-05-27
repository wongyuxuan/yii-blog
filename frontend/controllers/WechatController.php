<?php
/**
 * Created by PhpStorm.
 * User: huaji001
 * Date: 2019/3/18
 * Time: 1:33 PM
 */

namespace frontend\controllers;


use common\common;
use yii\base\Controller;
use Yii;

class WechatController extends Controller
{
    public function actionCheckSignature()
    {
        $signature = Yii::$app->request->get('signature');
        $timestamp = Yii::$app->request->get('timestamp');
        $nonce = Yii::$app->request->get('nonce');
        $echostr = Yii::$app->request->get('echostr');

        //校验参数是否来自微信
        $token = Yii::$app->params['weixin']['token'];
        $tmpArr = array($token,$timestamp,$nonce);
        sort($tmpArr);
        $tmpStr = implode('',$tmpArr);
        $newTmpStr = sha1($tmpStr);
        if($newTmpStr == $signature)
        {
            echo $echostr;
            $this->actionReciveEvent();
        }else{
            return false;
        }
    }

    public function actionReciveEvent()
    {
        if(Yii::$app->request->isPost){
            $wechatXml = file_get_contents('php://input');
            $WechatArr = common::xmlToArray($wechatXml);
            new WechatReply($WechatArr);
        }
    }

}