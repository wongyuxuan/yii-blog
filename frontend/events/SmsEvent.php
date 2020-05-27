<?php
/**
 * Created by PhpStorm.
 * User: huaji001
 * Date: 2019/3/7
 * Time: 1:44 PM
 */

namespace frontend\events;


use yii\base\Component;

class SmsEvent extends Component
{
    public function sendSms(){
        echo '我发送了短信';
        $this->trigger('login');
    }
}