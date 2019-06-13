<?php
/**
 * @var $model \app\models\Activity
 */
?>



<table>
    <?=\yii\helpers\Html::tag('thead', "$model->title", ['class' => 'title'])?>
    <tr><td>День начала события:</td><?=\yii\helpers\Html::tag('td', "$model->dateStart", ['class' => 'event'])?></tr>
    <tr><td>Описание события:</td><?=\yii\helpers\Html::tag('td', "$model->description", ['class' => 'event'])?></tr>
    <tr><td>Повтор события:</td><?=\yii\helpers\Html::tag('td', "$model->repeatType", ['class' => 'event'])?></tr>
    <tr><td>Уведомлять по почте</td><?=\yii\helpers\Html::tag('td', "$model->email", ['class' => 'email'])?></tr>
    <tr><td colspan="2"><?=\yii\helpers\Html::img("/images/$model->img",['width'=>200])?></td></tr>
    <tr><td><?= \yii\helpers\Html::a('Назад', ['activity/create'], ['class' => 'back']) ?></td>
        <td><?= \yii\helpers\Html::a('Редактировать', ['activity/change'], ['class' => 'change']) ?></td>
    </tr>
</table>
