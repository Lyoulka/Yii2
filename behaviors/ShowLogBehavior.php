<?php
namespace app\behaviors;
use app\components\ActivityComponent;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\log\Logger;
class ShowLogBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND=>'inLog',
            ActivityComponent::EVENT_MY_EVENT=>'inLog'
        ];
    }
    public function inLog(){
        \Yii::getLogger()->log('in logger event',Logger::LEVEL_WARNING);
    }
}