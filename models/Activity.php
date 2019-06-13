<?php


namespace app\models;


use yii\base\Model;

class Activity extends Model
{
    public $title;
    public $description;
    public  $dateStart;
    public  $dateFinish;
    public  $isBlocked;
    public  $isRepeat;

    public function rules(){
        return [
            ['title', 'string', 'min' => 5],
            ['title', 'required'],
            ['description', 'string'],
            ['isBlocked', 'boolean']
        ];

    }
    public function attributeLabels(){
        return [
            'title' => 'Заголовок описания',
            'description' => 'Описание',
            'isBlocked' => 'Блокирующее'
        ];
    }


}