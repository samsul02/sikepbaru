<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\detail\DetailView;
use kartik\file\FileInput;
use backend\components\SikepHelper;
use backend\components\widget\ProfileHeader;

/**
 * note: DetailView
 * http://demos.krajee.com/detail-view
 * 
 */
Url::remember();

$this->title = 'Biodata';
$this->params['breadcrumbs'][] = ['label' => 'Administrasi Pegawai', 'url' => ['/administrasipegawai/default']];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pegawai', 'url' => ['/administrasipegawai/datapegawai']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= ProfileHeader::widget($profileParams) ?>

<div class="tmst-pegawai-view">

    <div class="body-content">
        <p>
<?= Html::a('Update', ['pegawai/update', 'id' => $model->IdPegawai], ['class' => 'btn btn-primary']) ?>
        </p>

<?=
DetailView::widget([
    'model' => $model,
    'condensed' => true,
    'hover' => true,
    'mode' => DetailView::MODE_VIEW,
//            'panel' => [
//                'heading' => 'Book # ' . $model->id,
//                'type' => DetailView::TYPE_INFO,
//            ],
    'formOptions' => ['options' => ['enctype' => 'multipart/form-data']],
    'attributes' => [
        'NIK',
        [
            'attribute' => 'StatusPerkawinan',
            'value' => $model->statusPerkawinan->NamaStatusKawin,
//                    'type' => DetailView::INPUT_SELECT2,
//                    'widgetOptions' => [
//                        'data' => ArrayHelper::map(Author::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
//                    ]
        ],
        [
            'attribute' => 'JenisPegawai',
            'value' => isset($model->jenisPegawai) ? $model->jenisPegawai->NamaJenisPegawai : '',
        ],
        [
            'attribute' => 'StatusPegawai',
            'value' => isset($model->statusPegawai) ? $model->statusPegawai->StatusPegawai : '',
        ],
        [
            'attribute' => 'Agama',
            'value' => isset($model->agama) ? $model->agama->NamaAgama : '',
        ],
        'NomorTelepon',
        [
            'attribute' => 'PropinsiTempatLahir',
            'value' => isset($model->propinsiTempatLahir) ? $model->propinsiTempatLahir->NamaPropinsi : '',
        ],
        'JenisKelamin',
        [
            'attribute' => 'GolonganDarah',
            'value' => isset($model->golonganDarah) ? $model->golonganDarah->NamaGolonganDarah : '',
        ],
        'TinggiBadan',
        'BeratBadan',
        [
            'attribute' => 'Rambut',
            'value' => isset($model->rambut) ? $model->rambut->NamaJenisRambut : '',
        ],
        [
            'attribute' => 'WarnaKulit',
            'value' => isset($model->warnaKulit) ? $model->warnaKulit->NamaWarnaKulit : '',
        ],
        [
            'attribute' => 'BentukMuka',
            'value' => isset($model->bentukMuka) ? $model->bentukMuka->NamaBentukMuka : '',
        ],
        'CiriKhusus',
        'CacatTubuh',
        [
            'attribute' => 'IdSukuBangsa',
            'value' => isset($model->sukuBangsa) ? $model->sukuBangsa->NamaSukuBangsa : '',
        ],
        [
            'attribute' => 'DokumenAktaLahir',
            'value' => FileInput::widget([
                'model' => $model,
                'attribute' => 'DokumenAktaLahir',
                'value' => SikepHelper::getImageUrl($model->DokumenAktaLahir, '@uploadaktapegawaiurl'),
                'options' => [
                    //'accept' => 'image/*',
                    'multiple' => false
                ],
                'language' => 'id',
                'pluginOptions' => [
                    'initialPreview' => [
                        SikepHelper::getImageUrl($model->DokumenAktaLahir, '@uploadaktapegawaiurl'),
                    ],
                    'maxFileCount' => 1,
                    'overwriteInitial' => FALSE,
                    'initialPreviewAsData' => TRUE,
                    'initialCaption' => isset($model->DokumenAktaLahir) && !empty($model->DokumenAktaLahir) ? $model->DokumenAktaLahir : '',
                    'showRemove' => FALSE,
                    'showUpload' => FALSE,
                    'showBrowse' => FALSE,
                    'showCaption' => FALSE,
                    'dropZoneEnabled ' => FALSE,
                    'disabled' => TRUE,
                ]
            ]),
            'format' => 'raw',
        ],
        'KegemaranHobi',
        'MasaKerja',
        [
            'attribute' => 'KodeBankPegawai',
            'value' => isset($model->kodeBankPegawai) ? $model->kodeBankPegawai->NamaBank : '',
        ],
        'NomorRekeningPegawai',
        'CabangRekeningPegawai',
        'NamaRekeningPegawai',
        'FingerprintPegawai:ntext',
    //'IdPegawai',
    //'NIPLama',
    //'NIPBaru',
    //'NamaLengkap',
    //'GelarDepan',
    //'GelarBelakang',
    //'kodeGolonganRuang.NamaGolongan',
    //'TanggalLahir',
    //'kabupatenTempatLahir.NamaKabupaten',
    //'propinsiTempatLahir.NamaPropinsi',
    //'jabatan.NamaJabatan',                
    //'FotoPegawai',
    //'EmailPegawai:email',
    //'NomorHandphone',
    //['attribute' => 'publish_date', 'type' => DetailView::INPUT_DATE],
    ]
])
?>

    </div>
</div>
