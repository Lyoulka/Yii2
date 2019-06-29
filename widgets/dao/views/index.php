<?php
/**
 * @var \yii\web\View $this
 */

$this->registerJsVar('valn','ssd');
\app\widgets\dao\assets\DaoAsset::register($this);
?>
<div class="col-md-6">
    <h3>From widget</h3>
    <pre>
            <?=print_r($users);?>
        </pre>
</div>