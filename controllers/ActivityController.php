<?php
namespace app\controllers;
use app\base\BaseWebController;
use app\controllers\actions\ActivityCreateAction;
use app\controllers\actions\ActivityChangeAction;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
class ActivityController extends BaseWebController
{
    public function actions()
    {
        return [
            'create' => ['class' => ActivityCreateAction::class],
            'change' => ['class' => ActivityChangeAction::class],
        ];
    }
    public function actionHelper(){
        $arr1=['ones'=>'val1','tho'=>['treee'=>'val2']];
        $val=ArrayHelper::getValue($arr1,'one','def');
        $val1=ArrayHelper::getValue($arr1,'tho.treee');
        $data=[['id'=>2,'name'=>'one','phone'=>'888'],['id'=>3,'name'=>'two','phone'=>'888']];
        $values=ArrayHelper::map($data,'id',function($data){
            return ArrayHelper::getValue($data,'name').' ('.
                ArrayHelper::getValue($data,'phone').')';
        });
        echo $val;
        echo '</br>'.$val1;
//      exit;
        return $this->render('helper',['values'=>$values]);
    }
}
