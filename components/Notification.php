<?php


namespace app\components;


use app\models\Activity;

interface Notification
{
    /**
     * @param Activity[] $activities
     * @return bool
     */
    public function sendNotification($activities):bool;
}