<?php

namespace backend\components\widget;

use yii\base\Widget;
use backend\components\SikepHelper;

/**
 * Override Kartik's GridView
 *
 * @author chakoo
 */
class GridView extends Widget {

    public $title;
    public $dataProvider;
    public $filterModel;
    public $columns;
    public $condensed;
    public $hover;
    public $resizableColumns;
    public $persistResize;
    public $responsiveWrap;
    public $floatHeader;
    public $pjax;
    public $pjaxSettings;

    public function init() {
        parent::init();

        if ($this->title === null) {
            $this->title = 'Document export';
        }

        if ($this->columns === null) {
            $this->columns = [];
        }

        if ($this->condensed === null) {
            $this->condensed = TRUE;
        }

        if ($this->hover === null) {
            $this->hover = TRUE;
        }

        if ($this->resizableColumns === null) {
            $this->resizableColumns = TRUE;
        }

        if ($this->persistResize === null) {
            $this->persistResize = TRUE;
        }

        if ($this->responsiveWrap === null) {
            $this->responsiveWrap = TRUE;
        }

        if ($this->floatHeader === null) {
            $this->floatHeader = TRUE;
        }

        if ($this->pjax === null) {
            $this->pjax = TRUE;
        }

        if ($this->pjaxSettings === null) {
            $this->pjaxSettings = [
                'neverTimeout' => TRUE,
                'options' => ['id' => 'kv-unique-id-1'],
                    //'beforeGrid' => 'My fancy content before.',
                    //'afterGrid' => 'My fancy content after.',
            ];
        }
    }

    public function run() {
        $params = [
            'dataProvider' => $this->dataProvider,
            'filterModel' => $this->filterModel,
            'moduleId' => 'gridview',
            'condensed' => $this->condensed,
            'hover' => $this->hover,
            'resizableColumns' => $this->resizableColumns,
            'persistResize' => $this->persistResize,
            'responsiveWrap' => $this->responsiveWrap,
            'floatHeader' => $this->floatHeader,
            'pjax' => $this->pjax,
            'pjaxSettings' => $this->pjaxSettings,
            'columns' => $this->columns,
            'floatHeaderOptions' => ['scrollingTop' => '50'],
            'export' => ['fontAwesome' => TRUE],
            'exportConfig' => SikepHelper::getDocumentExportConfig($this->title),
            'panel' => ['before' => ''], //'before' harus diset biar toolbar nongol
            'toolbar' => [
//            [
//                'content' => Html::button('<i class="glyphicon glyphicon-plus"></i>', [
//                    'type' => 'button',
//                    //'title' => Yii::t('kvgrid', 'Add Book'),
//                    'title' => 'title 1',
//                    'class' => 'btn btn-success',
//                ]) . ' ' .
//                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], [
//                    'class' => 'btn btn-default',
//                    'title' => 'title 2',
//                        //'title' => Yii::t('kvgrid', 'Reset Grid')
//                ]),
//            ],
                '{export}',
//            '{toggleData}'
            ],
            'toggleDataContainer' => ['class' => 'btn-group-sm'],
            'exportContainer' => ['class' => 'btn-group-sm']
        ];

        return $this->render('_gridView', ['params' => $params,]);
    }

}
