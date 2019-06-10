<?php


namespace app\components;

use app\models\DaySchedule;
use yii\base\Component;
use yii\base\Model;

class DayComponent extends Component
{
    public $modelClass;
    /**
     * @return Model
     */
    public function getModel(){
        return new $this->$modelClass;
    }
    public function createActivity(DaySchedule &$model):bool{
        if ($model->validate()){
            return true;
        }
        return false;
    }
}