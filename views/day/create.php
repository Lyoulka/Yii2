<?php
/**
 * $var $model \app\models\DaySchedule
 */
?>
<h2>Рассписание на день</h2>

<h4>Сегодня <?=$date;?> (<?=$day; ?>)</h4>
<ul>
    <?php
    $d ='';
    foreach ($event as $d) : ?>
    <li>
        <?=$d;?>
    </li>
    <?php endforeach;?>
</ul>
