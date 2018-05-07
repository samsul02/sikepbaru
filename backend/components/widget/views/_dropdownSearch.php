<?php

/**
 * ini view widget DropdownSearch
 *
 * @author chakoo
 */
use kartik\select2\Select2;
?>

<?php

echo $form->field($model, $attribute)->widget(Select2::classname(), [
    'data' => $data,
    'options' => $options,
    'pluginOptions' => [
        'allowClear' => true
    ],
    'language' => 'id',
]);
?>