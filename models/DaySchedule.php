<?php


namespace app\models;


use yii\base\Model;

class DaySchedule extends Model
{
    public $date;
    public $day;
    public $event;
    public $history = array();
    public $url;
    public function rules(){
        return [
            ['date', 'string'],
            ['day', 'string'],
        ];

    }
    public function isDay() {
        $day = new \DateTime("now", new \DateTimeZone("Europe/Moscow"));
        $day = $day->format('N');
        switch ($day){
            case 1:
                $day = 'Понедельник - рабочий день';
                break;
            case 2:
                 $day = 'Вторник - рабочий день';
                 break;
            case 3:
                $day = 'Среда - рабочий день';
                break;
            case 4:
                $day = 'Четверг - рабочий день';
                break;
            case 5:
                $day = 'Пятница - рабочий день';
                break;
            case 6:
                $day = 'Суббота - выходной';
                break;
            case 7:
                $day = 'Воскресенье - выходной';
                break;
        }
        return $day;
    }
    public function urlHistory(){
//        $url =  \Yii::$app->request->url;
//        array_push($_SESSION['history'], $url);
//        return  $_SESSION['history'];
    }
}