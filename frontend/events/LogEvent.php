<?php
/**
 * Created by PhpStorm.
 * User: huaji001
 * Date: 2019/3/7
 * Time: 1:44 PM
 */

namespace frontend\events;


use yii\base\Component;

class LogEvent extends Component
{
    public function log(){
       echo '我记录了日志';
    }
}