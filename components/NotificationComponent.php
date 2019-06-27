<?php
namespace app\components;
use app\models\Activity;
use yii\base\Component;
use yii\console\Application;
use yii\helpers\Console;
use yii\mail\MailerInterface;
class NotificationComponent extends Component
{
    /** @var MailerInterface */
    public $mailer;
    /**
     * @param $activities Activity[]
     * @return bool
     */
    public function sendNotification($activities):bool{
        foreach ($activities as $activity){
            $sended=$this->mailer->compose('notification',['title'=>$activity->title,
                'description'=>$activity->description])
                ->setFrom('YourEmail@mail.ru')
                ->setTo(trim($activity->email))
                ->setSubject('Событие стартует сегодня')
                ->send();
            if($sended){
                if(\Yii::$app instanceof Application){
                    echo Console::ansiFormat('Sended mail to '.$activity->email,
                            [Console::FG_GREEN]).PHP_EOL;
                }
            }else{
                echo 'error'.PHP_EOL;
                return false;
            }
        }
        return true;
    }
}