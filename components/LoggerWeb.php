<?php


namespace app\components;


class LoggerWeb implements Logger
{

    public function log($text)
    {
        \Yii::getLogger()->log($text,\yii\log\Logger::LEVEL_WARNING);
    }
}