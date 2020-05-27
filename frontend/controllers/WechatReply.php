<?php
/**
 * Created by PhpStorm.
 * User: huaji001
 * Date: 2019/3/18
 * Time: 5:32 PM
 */

namespace frontend\controllers;




class WechatReply
{
    private $WechatArr;

    public function __construct($WechatArr)
    {
        $this->WechatArr = $WechatArr;
        switch ($WechatArr['MsgType'])
        {
            case 'event':
                $this->actionEvent();
                break;
            case 'text':
                $this->actionText();
                break;

        }


    }

    public function actionReplyText($content)
    {
        $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
					</xml>";
        $msgType = "text";
        echo sprintf($textTpl,$this->WechatArr['FromUserName'],$this->WechatArr['ToUserName'],time(),$msgType,$content);
    }

    public function actionEvent()
    {
        if($this->WechatArr['Event'] == 'subscribe')
        {
            $this->actionReplyText('感谢关注PHP知识共享');
        }
    }

    public function actionText()
    {
        $contentArr = ['今天你开心吗？','你今天很漂亮','祝你今天好运','很高兴在这里遇到你'];
        if($this->WechatArr['Content'] == '你好')
        {
            $this->actionReplyText('你好');
        }elseif($this->WechatArr['Content'] == '你在吗'){
            $this->actionReplyText('我在的');
        }else{
            $rand = rand(0,count($contentArr)-1);
            $this->actionReplyText($contentArr[$rand]);
        }
    }


}