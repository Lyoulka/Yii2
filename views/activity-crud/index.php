<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Activities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Activity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            ['attribute'=>'title',
                'format' => 'html',
                'label' => 'Заголовок',
                'value' => function($model){
                    return Html::a(Html::encode($model->title),['/activity/view',
                        'id'=>$model->id]);
                }
            ],
            'description:ntext:Описание задания',
            [
                'attribute'=>'startDate',
                'value' => function(\app\models\Activity $model){
                    $model->attachBehavior('getdate',
                        ['class'=>\app\behaviors\GetDateCreatedBegavior::class,
                            'attribute_name' => 'created_at']);
                    $date= $model->getDateCreated();
                    $model->detachBehavior('getdate');
                    return$date;
                }
            ],
            'endDate',
            //'isBlocked',
            //'isRepeat',
            //'email:email',
            //'created_at',
 //           [
//                'attribute' => 'userId',
//                'value' => function(\app\models\Activity $model){
//                    return $model->user->email;
//                }
//            ],
                'user.email',
                ['class' => 'yii\grid\ActionColumn'],
            ],
    ]); ?>


</div>
