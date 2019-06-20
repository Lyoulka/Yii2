<?php
/**
 * @var $model \app\models\Activity
 */
?>
<h2>Редактирование события</h2>
<div class="row">
    <div class="col-md-6">
        <?php $form=\yii\bootstrap\ActiveForm::begin(
//                ['enableAjaxValidation' => true]
        ); ?>
        <?=$form->field($model, 'title');?>
        <?=$form->field($model,'startDate');?>
        <?=$form->field($model, 'description')->textarea(['data-id' => 'spf']);?>
        <?=$form->field($model, 'isBlocked')->checkbox();?>
        <?=$form->field($model,'repeatType')->dropDownList($model::REPEAT_TYPE)?>
        <?=$form->field($model,'useNotification')->checkbox();?>
        <?=$form->field($model,'email',['enableAjaxValidation'=>true,
            'enableClientValidation'=>false])?>
        <?=$form->field($model,'img')->fileInput()?>
        <div class="form-group">
            <button type="submit">Сохранить</button>
        </div>
        <?php \yii\bootstrap\ActiveForm::end();?>
    </div>
</div>
