<?php


namespace app\controllers\actions;
use app\components\DayComponent;
use app\models\DaySchedule;
use yii\base\Action;

class DayCreateAction extends Action
{
    public function run(){
        $model = new DaySchedule();
        /** @var DayComponent  $comp */
        $comp = \Yii::createObject(['class' => DayComponent::class,
            'modelClass' => 'app\models\DaySchedule']);
        $date = date("d.m.Y");
        $day = $model -> isDay();
        $url = $model -> urlHistory();
        return  $this -> controller -> render('create', ['date' => $date, 'day' => $day ,'event' => ['1' => '7.00 Встать', '2' => '8.00 Пойти на работу', '3' => '9.00 Попить кофе', '4' => '10.00 Спрятаться от начальника',], 'url' => $url, 'model'=>$model]);
    }

}