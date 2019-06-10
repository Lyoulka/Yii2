<?php
namespace app\controllers\actions;
use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityCreateAction extends Action
{
    public function run(){
        $model = new Activity();
        /** @var ActivityComponent  $comp */
        $comp = \Yii::createObject(['class' => ActivityComponent::class,
            'modelClass' => 'app\models\Activity']);
        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
           if(\Yii::$app->activity->createActivity($model)){
               echo 'OK';
               exit;
           }
        }
        $url = $model -> getLink();
        return  $this -> controller -> render('create', ['name' => 'Юлия', 'model'=>$model, 'url' => $url]);


    }
}