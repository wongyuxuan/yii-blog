<?php


namespace common\models;

use Yii;
use yii\base\Model;

/**
 * 第三方模型
 *
 * Class ThridLoginForm
 * @package common\models
 */
class ThridForm extends Model
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_REGISTER = 'register';
    public $openid;
    private $_user;

    public function rules()
    {
        return [
            //openid必填
            ['openid','required','on'=>[self::SCENARIO_LOGIN,self::SCENARIO_REGISTER]],
            ['openid','validateOpenid','on'=>[self::SCENARIO_LOGIN]],
            ['openid','unique','on'=>[self::SCENARIO_REGISTER]],
            [['avatar','client','username','gender'],'required','on'=>[self::SCENARIO_REGISTER]],
        ];
    }

    //场景：登陆和注册
    public function scenarios()
    {
        return[
            self::SCENARIO_LOGIN => ['openid'],
            self::SCENARIO_REGISTER => ['openid','avatar','client','username','gender']
        ];
    }

    /**
     * 验证openId
     *
     * @param $attribute
     * @param $params
     */
    public function validateOpenid($attribute,$params)
    {
        if(!$this->hasErrors()){
            $user = $this->getUser();
            var_dump($user); die;
            if(!$user || !$user->role == 1){
                $this->addError($attribute,'您不是管理员，无权登陆！');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    /**
     * 获取用户信息
     *
     * @return User|null
     */
    protected function getUser()
    {
        if($this->_user === null){
            $this->_user = User::findByOpenId($this->openid);
        }

        return $this->_user;
    }

}