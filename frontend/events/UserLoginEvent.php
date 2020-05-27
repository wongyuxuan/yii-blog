<?php
/**
 * Created by PhpStorm.
 * User: huaji001
 * Date: 2019/3/6
 * Time: 5:05 PM
 */
namespace frontend\events;

use yii\base\Event;

class UserLoginEvent extends Event
{
    public $msg = 0;
}