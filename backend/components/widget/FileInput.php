<?php

namespace backend\components\widget;

use yii\base\Widget;
//use kartik\file\FileInput;
use backend\components\SikepHelper;

/**
 * Description of FileInput
 *
 * @author chakoo
 */
class FileInput extends Widget {

    public $form;
    public $model;
    public $attribute;
    public $options;
    public $maxImageWidth;
    public $maxImageHeight;
    public $allowedFileExtensions;
    public $initialPreview;
    public $initialPreviewAsData;
    public $initialCaption;
    public $deleteUrl;
    public $value;
    public $language;

    public function init() {
        parent::init();

        if ($this->form === null) {
            $this->form = NULL;
        }

        if ($this->options === null) {
            $this->options = ['accept' => 'image/*'];
        }

        if ($this->maxImageWidth === null) {
            $this->maxImageWidth = 600;
        }

        if ($this->maxImageHeight === null) {
            $this->maxImageHeight = 900;
        }

        if ($this->allowedFileExtensions === null) {
            $this->allowedFileExtensions = ['jpg', 'png', 'pdf'];
        }

        if ($this->initialPreview === null) {
            $this->initialPreview = SikepHelper::getImageUrl('', '@uploadfotopegawaiurl');
        }

        if ($this->initialPreviewAsData === null) {
            $this->initialPreviewAsData = TRUE;
        }

        if ($this->initialCaption === null) {
            $this->initialCaption = '';
        }

        if ($this->value === null) {
            $this->value = '';
        }
    }

    public function run() {
//        if (isset($form)) {
        return $this->render('_fileInput', [
                    'form' => $this->form,
                    'model' => $this->model,
                    'attribute' => $this->attribute,
                    'value' => $this->value,
                    'options' => $this->options,
                    'language' => $this->language,
                    'maxImageWidth' => $this->maxImageWidth,
                    'maxImageHeight' => $this->maxImageHeight,
                    'allowedFileExtensions' => $this->allowedFileExtensions,
                    'initialPreview' => $this->initialPreview,
                    'initialPreviewAsData' => $this->initialPreviewAsData,
                    'initialCaption' => $this->initialCaption,
                    'deleteUrl' => $this->deleteUrl,
        ]);
//        } else {
//            return FileInput::widget([
//                        'model' => $this->model,
//                        'attribute' => $this->attribute,
//                        'value' => $this->value,
//                        'options' => $this->options,
//                        'language' => $this->language,
//                        'pluginOptions' => [
//                            'initialPreview' => [
//                                $this->initialPreview,
//                            ],
//                            'maxFileCount' => 1,
//                            'overwriteInitial' => FALSE,
//                            'initialPreviewAsData' => TRUE,
//                            'initialCaption' => $this->initialCaption,
//                            'showRemove' => FALSE,
//                            'showUpload' => FALSE,
//                            'showBrowse' => FALSE,
//                            'showCaption' => FALSE,
//                            'dropZoneEnabled ' => FALSE,
//                            'disabled' => TRUE,
//                        ]
//            ]);
//        }
    }

}
