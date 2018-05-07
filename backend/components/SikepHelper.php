<?php

namespace backend\components;

use yii;
use yii\helpers\Url;
use kartik\grid\GridView;

class SikepHelper {

    /**
     * 
     * return url 
     * @param type $alias
     * @return type
     */
    public function getAlias($alias) {
        return Url::base() . Yii::getAlias($alias);
    }

    /**
     * fetch stored image url
     * return a default image placeholder if image is not found
     * @return string
     */
    public function getImageUrl($imgName, $alias) {
        $path = isset($imgName) ? (self::getAlias($alias) . '/' . $imgName) : null;

        // note: file_exists ga berfungsi, nanti dicek lg
        if (!empty($path) /* && file_exists($path) */) {
            return $path;
        }

        //klo gambar unavailable, pake blank jpg dari assets dulu
        return self::getAlias('@assetsdatapegawai') . '/' . Yii::$app->params['emptyImageName'];
    }

    /**
     * Process deletion of image
     * @return boolean the status of deletion
     */
    public function deleteFile($imgName, $alias) {
        $path = isset($imgName) ? (self::getAlias($alias) . '/' . $imgName) : null;

        // check if file exists on server
        if (empty($path) || !file_exists($path)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($path)) {
            return false;
        }

        return true;
    }

    /**
     * 
     * upload image / doc
     * @param type $img
     * @param type $prefix
     * @param type $alias
     * @return string
     */
    public function uploadFile($img, $prefix, $alias) {
        if (!empty($img)) {
            $imgName = $prefix . '.' . $img->extension;
            if ($img->saveAs(Yii::getAlias($alias) . '/' . $imgName)) {
                return $imgName;
            }
        }

        return NULL;
    }

    /**
     * 
     * @param type $fileName
     * @return type
     */
    public function getDocumentExportConfig($fileName) {
        return [
            GridView::EXCEL => [
                'label' => 'Export ke Excel',
                'icon' => 'file-excel-o',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'filename' => $fileName,
                'alertMsg' => 'Menyiapkan file excel untuk diunduh.',
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => 'ExportWorksheet',
                    'cssFile' => ''
                ],
//            'options' => ['title' => 'Portable Document Format'],
//            'showPageSummary' => true,
//            'showFooter' => true,
//            'showCaption' => true,
            ],
            GridView::PDF => [
                'label' => 'Export ke PDF',
                'icon' => 'file-pdf-o',
                'iconOptions' => ['class' => 'text-danger'],
                'showHeader' => true,
                'filename' => $fileName,
                'alertMsg' => 'Menyiapkan file pdf untuk diunduh.',
                'mime' => 'application/pdf',
                'config' => [
                    'mode' => 'c',
                    'format' => 'A4-L',
                    'destination' => 'D',
                    'marginTop' => 20,
                    'marginBottom' => 20,
                    'cssInline' => '.kv-wrap{padding:20px;}' .
                    '.kv-align-center{text-align:center;}' .
                    '.kv-align-left{text-align:left;}' .
                    '.kv-align-right{text-align:right;}' .
                    '.kv-align-top{vertical-align:top!important;}' .
                    '.kv-align-bottom{vertical-align:bottom!important;}' .
                    '.kv-align-middle{vertical-align:middle!important;}' .
                    '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                    '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                    '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
//                'methods' => [
//                    'SetHeader' => [
//                        ['odd' => $pdfHeader, 'even' => $pdfHeader]
//                    ],
//                    'SetFooter' => [
//                        ['odd' => $pdfFooter, 'even' => $pdfFooter]
//                    ],
//                ],
                    'options' => [
                        'title' => 'PDF',
//                    'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
//                    'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf')
                    ],
                    'contentBefore' => '',
                    'contentAfter' => ''
                ]
            ],
            GridView::HTML => [
                'label' => 'HTML',
                'icon' => 'file-text',
                'iconOptions' => ['class' => 'text-info'],
                'showHeader' => true,
                'filename' => $fileName,
                'alertMsg' => 'Menyiapkan file html untuk diunduh.',
                'mime' => 'text/html',
                'config' => [
                    'cssFile' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
                ]
            ],
            GridView::CSV => [
                'label' => 'Export ke CSV',
                'icon' => 'file-code-o',
                'iconOptions' => ['class' => 'text-primary'],
                'showHeader' => true,
                'filename' => $fileName,
                'alertMsg' => 'Menyiapkan file csv untuk diunduh.',
                'mime' => 'application/csv',
                'config' => [
                    'colDelimiter' => ",",
                    'rowDelimiter' => "\r\n",
                ]
            ],
            GridView::TEXT => [
                'label' => 'Export ke text',
                'icon' => 'file-text-o',
                'iconOptions' => ['class' => 'text-muted'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => $fileName,
                'alertMsg' => 'Menyiapkan file text untuk diunduh.',
                'mime' => 'text/plain',
                'config' => [
                    'colDelimiter' => "\t",
                    'rowDelimiter' => "\r\n",
                ]
            ],
            GridView::JSON => [
                'label' => 'Export ke JSON',
                'icon' => 'file-code-o',
                'iconOptions' => ['class' => 'text-warning'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => $fileName,
                'alertMsg' => 'Menyiapkan file JSON untuk diunduh.',
                'mime' => 'application/json',
                'config' => [
                    'colHeads' => [],
                    'slugColHeads' => false,
                    'jsonReplacer' => null,
                    'indentSpace' => 4
                ]
            ],
        ];
    }

    public function validateModel($model) {
        if ($model === NULL) {
            throw new NotFoundHttpException(Yii::$app->params['pageNotFound']);
        }

        return $model;
    }

    /**
     * Logs messages/variables/data to browser console from within php
     *
     * @param $name: message to be shown for optional data/vars
     * @param $data: variable (scalar/mixed) arrays/objects, etc to be logged
     * @param $jsEval: whether to apply JS eval() to arrays/objects
     *
     * @return none
     * @author Sarfraz
     */
    public function cs($name, $data = NULL, $jsEval = FALSE) {
        if (!$name)
            return false;

        $isevaled = false;
        $type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

        if ($jsEval && (is_array($data) || is_object($data))) {
            $data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
            $isevaled = true;
        } else {
            $data = json_encode($data);
        }

        # sanitalize
        $data = $data ? $data : '';
        $search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
        $replace_array = array('"', '', '', '\\n', '\\n');
        $data = preg_replace($search_array, $replace_array, $data);
        $data = ltrim(rtrim($data, '"'), '"');
        $data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

        $js = <<<JSCODE
\n<script>
 // fallback - to deal with IE (or browsers that don't have console)
 if (! window.console) console = {};
 console.log = console.log || function(name, data){};
 // end of fallback

 console.log('$name');
 console.log('------------------------------------------');
 console.log('$type');
 console.log($data);
 console.log('\\n');
</script>
JSCODE;
        echo $js;
    }

# end consoleLog
}