<?php

namespace backend\components\widget;

use yii\base\Widget;

/**
 * Description of DatePicker
 *
 * @author chakoo
 */
class DatePicker extends Widget {

    public $form;
    public $model;
    public $attribute;
    public $dateFormat;
    public $yearRange;
    public $minDate;
    public $maxDate;

    public function init() {
        parent::init();

        if ($this->dateFormat === null) {
            $this->dateFormat = 'php:d F Y';
            //$this->dateFormat = 'yyyy-MM-dd';
        }

        if ($this->yearRange === null) {
            $this->yearRange = '1901:2099';
        }

        if ($this->minDate === null) {
            $this->minDate = '-80Y'; //note: 80 tahun ke belakang only
        }

        if ($this->maxDate === null) {
            $this->maxDate = '+0Y';
        }
    }

    public function run() {
        return $this->render('_datePicker', [
                    'form' => $this->form,
                    'model' => $this->model,
                    'attribute' => $this->attribute,
                    'dateFormat' => $this->dateFormat,
                    'yearRange' => $this->yearRange,
                    'minDate' => $this->minDate,
                    'maxDate' => $this->maxDate,
        ]);
    }

}
