<?php


namespace app\models;

use app\models\validations\StopPhraseValidation;
use yii\base\Model;

class Activity extends ActivityBase
{

    public $emailRepeat;
    public $useNotification;
    public $repeatType;
    public $img;
    public const REPEAT_TYPE=['1d'=>'Каждый день','1w'=>'Каждую неделю'];
    public function beforeValidate()
    {
        if($this->startDate){
            if($date=\DateTime::createFromFormat('d.m.Y',$this->startDate)){
                $this->startDate=$date->format('Y-m-d');
            }
        }
        return parent::beforeValidate();
    }
    public function rules()
    {
        return array_merge([
            ['title','string','min'=> 3, 'max' => 30],
            ['title','trim'], //убирает пробелы
            [['title','startDate'], 'required' ],
            //['title','match','pattern' => '/[a-zA-Z]{5,}/','message' => 'Заголовок должен состоять только из
//            латинских букв'],
            ['title',StopPhraseValidation::class],
            ['description', 'string','max'=> 255],
            [['startDate','endDate','isRepeat'],'date','format' => 'php:Y-m-d'],
            [['isBlocked','useNotification'],'boolean'],
            ['repeatType','in','range' => array_keys(self::REPEAT_TYPE)],
            ['img','file','extensions' => ['jpg','png']],
            ['email','email'],
            [['isRepeat'],'default','value' => 0],
            ['email','required','when' => function($model){
                return $model->useNotification;
            }],
            ['emailRepeat','compare','compareAttribute' => 'email']
        ],parent::rules());
    }

    public function stopPhraseTitle($attr){
        if(in_array($this->title,['шаурма','бордюр'])){
            $this->addError($attr,'Недопустимое название события');
        }
    }
    public function attributeLabels(){
        return [
            'title' => 'Заголовок описания',
            'description' => 'Описание',
            'isBlocked' => 'Блокирующее'
        ];
    }
}