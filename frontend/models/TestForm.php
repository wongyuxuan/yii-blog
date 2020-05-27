<?php
namespace frontend\models;

use yii\elasticsearch\ActiveRecord;

class TestForm extends ActiveRecord
{

    public static function getDb()
    {
        return \Yii::$app->get('elasticsearch');
    }

    public static function index()
    {
        return 'megacorp';
    }

    # table
    public static function type()
    {
        return 'employee';
    }
}