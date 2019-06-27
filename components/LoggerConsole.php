<?php


namespace app\components;


class LoggerConsole implements Logger
{

    public function log($text)
    {
        echo $text.PHP_EOL;
    }
}