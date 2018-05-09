<?php

/**
 * ini view widget DropdownSearch
 *
 * @author chakoo
 */

/**
 *  
 * FileInput
 * http://demos.krajee.com/widget-details/fileinput
 * http://plugins.krajee.com/file-advanced-usage-demo
 */
use kartik\file\FileInput;
?>

<?php

if (!is_null($form)) {
    //ini fileinput di form vield
    echo $form->field($model, $attribute)->widget(FileInput::classname(), [
        'resizeImages' => TRUE,
        'options' => $options,
        'language' => $language,
        'pluginOptions' => [
            'maxImageWidth' => $maxImageWidth,
            'maxImageHeight' => $maxImageHeight,
            'maxFileCount' => 1,
            'allowedFileExtensions' => $allowedFileExtensions,
            'initialPreview' => [$initialPreview],
            'initialPreviewAsData' => $initialPreviewAsData,
            'initialCaption' => $initialCaption,
            'maxFileSize' => 2000,
            'showRemove' => FALSE,
            'showUpload' => FALSE,
            'deleteUrl' => $deleteUrl,
        //'overwriteInitial' => TRUE,
        //'uploadUrl' => 'upload-image?id=' . $model->IdPegawai,
        //'initialPreviewShowDelete' => false,
        //'previewFileType' => 'any',//'any','image'
        //'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        //'browseLabel' => 'Select Photo'
        //'browseClass' => 'btn btn-success',
        //'uploadClass' => 'btn btn-info',
        //'removeClass' => 'btn btn-danger',
        //'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
        //'browseLabel' => '',
        //'removeLabel' => '',
        //'mainClass' => 'input-group-lg'
        //'showPreview' => false,
        //'showCaption' => true,
        //'dropZoneEnabled ' => FALSE,
        //'showBrowse' => FALSE,
        //'showCaption' => FALSE,
        //'dropZoneEnabled ' => FALSE,
        ]
    ]);
} else {
    //ini fileinput di view (no upload)
    echo FileInput::widget([
        'model' => $model,
        'attribute' => $attribute,
        'value' => $value,
        'options' => $options,
        'language' => $language,
        'pluginOptions' => [
            'initialPreview' => [
                $initialPreview,
            ],
            'maxFileCount' => 1,
            'overwriteInitial' => FALSE,
            'initialPreviewAsData' => TRUE,
            'initialCaption' => $initialCaption,
            'showRemove' => FALSE,
            'showUpload' => FALSE,
            'showBrowse' => FALSE,
            'showCaption' => FALSE,
            'dropZoneEnabled ' => FALSE,
            'disabled' => TRUE,
        ]
    ]);
}
?>