<?php

/**
 * ini view widget DatePicker
 *
 * @author chakoo
 */
use yii\jui\DatePicker;
?>

<?=

$form->field($model, $attribute)->widget(DatePicker::class, [
    //'language' => 'id', //note: kalo dijadiin indonesia, error pas saving
    'dateFormat' => $dateFormat,
    'options' => [
        'class' => 'form-control',
    ],
    'clientOptions' => [
        'changeYear' => TRUE,
        'changeMonth' => TRUE,
        'yearRange' => $yearRange,
        'minDate' => $minDate,
        'maxDate' => $maxDate,
    ],
])
?>