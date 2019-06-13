<?php
namespace app\controllers\actions;
use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;
use yii\web\Response;
use yii\widgets\ActiveForm;
class ActivityCreateAction extends Action
{
    public function run(){
        $model = new Activity();
        /** @var ActivityComponent  $comp */
        $comp = \Yii::createObject(['class' => ActivityComponent::class,
            'modelClass' => 'app\models\Activity']);
        if (\Yii::$app->request->isPost){
            $model->load(\Yii::$app->request->post());
            if(\Yii::$app->request->isAjax){
                \Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            if(\Yii::$app->activity->createActivity($model)){
                return $this->controller->render('view',['model'=>$model]);
            }
        }

        return  $this -> controller -> render('create', ['name' => 'Юлия', 'model'=>$model]);
    }
}