<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 17.05.2016
 * Time: 12:13
 */

namespace app\my;
use Yii;


class ScriptModel {
    public static $urls = array (
        "warehouse/ext/holidays.sql" => "holiday",
        "asr/tariff/tariffs.sql" => "tariff"
    );

    public static function onAction()
    {
        if (isset($_REQUEST['script']))
        {
            if (isset(self::$urls[$_REQUEST['script']]))
                return self::$urls[$_REQUEST['script']]."?".Yii::$app->request->queryString;
        }
        return null;
    }
}