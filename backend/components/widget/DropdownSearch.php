<?php

namespace backend\components\widget;

use yii\base\Widget;

/**
 * Description of DropdownSearch
 *
 * @author chakoo
 */
class DropdownSearch extends Widget {

    public $form;
    public $model;
    public $data;
    public $placeholder;
    public $attribute;
    public $id;

    public function init() {
        parent::init();
    }

    public function run() {
        $options = array();
        $options['placeholder'] = $this->placeholder;

        if (!is_null($this->id)) {
            $options['id'] = $this->id;
        }

        return $this->render('_dropdownSearch', [
                    'form' => $this->form,
                    'model' => $this->model,
                    'attribute' => $this->attribute,
                    'data' => $this->data,
                    'options' => $options,
        ]);
    }

}
