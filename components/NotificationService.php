<?php


namespace app\components;


use app\models\Activity;
use yii\console\Application;
use yii\helpers\Console;
use yii\mail\MailerInterface;

class NotificationService implements Notification
{
    /** @var MailerInterface */
    private $mailer;

    /** @var Logger */
    private $logger;

    public function __construct(MailerInterface $mailer, Logger $logger)
    {
        $this->mailer=$mailer;
        $this->logger=$logger;
    }


    /**
     * @param Activity[] $activities
     * @return bool
     */
    public function sendNotification($activities): bool
    {
        foreach ($activities as $activity){

            $sended=$this->mailer->compose('notification',['title'=>$activity->title,
                'description'=>$activity->description])
                ->setFrom('geekbrains@onedeveloper.ru')
                ->setTo(trim($activity->email))
                ->setSubject('Событие стартует сегодня')
                ->send();

            if($sended){
                $this->logger->log('Sended mail to '.$activity->email);
            }else{
                $this->logger->log('error');
                return false;
            }

        }

        return true;
    }
}