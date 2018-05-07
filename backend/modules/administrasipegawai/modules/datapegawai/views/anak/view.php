<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\file\FileInput;
use backend\components\SikepHelper;
use backend\components\widget\ProfileHeader;

$this->title = $model->IdAnggotaKeluarga;
$this->params['breadcrumbs'][] = ['label' => 'Administrasi Pegawai', 'url' => ['/administrasipegawai/default']];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pegawai', 'url' => ['/administrasipegawai/datapegawai']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= ProfileHeader::widget($profileParams) ?>

<div class="tmst-keluarga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdAnggotaKeluarga], ['class' => 'btn btn-primary']) ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'IdAnggotaKeluarga',
            //'IDPegawai',
            'JenisHubunganKeluarga',
            'JenisKelamin',
            'NamaAnggotaKeluarga',
            'TempatLahirAnggotaKeluarga',
            //'TanggalLahirAnggotaKeluarga',
            [
                'attribute' => 'TanggalLahirAnggotaKeluarga',
                'value' => (($model->TanggalLahirAnggotaKeluarga != '0000-00-00' && $model->TanggalLahirAnggotaKeluarga != '0001-11-30') ? Yii::$app->formatter->asDate($model->TanggalLahirAnggotaKeluarga, 'php:d F Y') : '-'),
            ],
            'PekerjaanAnggotaKeluarga',
            'AlamatKantorAnggotaKeluarga',
            'NoIndukPegawaiKeluarga',
            'Agama',
            'StatusPerkawinan',
            'TanggalNikah',
            'StatusKesehatan',
            'PendidikanTerakhir',
            'IsHidup',
            'BerhakTunjangan',
            'DokumenHubunganKeluarga',
            [
                'attribute' => 'DokumenHubunganKeluarga',
                'value' => FileInput::widget([
                    'model' => $model,
                    'attribute' => 'DokumenHubunganKeluarga',
                    'value' => SikepHelper::getImageUrl($model->DokumenHubunganKeluarga, '@uploadAktaAnakurl'),
                    'options' => [
                        //'accept' => 'image/*',
                        'multiple' => false
                    ],
                    'language' => 'id',
                    'pluginOptions' => [
                        'initialPreview' => [
                            SikepHelper::getImageUrl($model->DokumenHubunganKeluarga, '@uploadAktaAnakurl'),
                        ],
                        'maxFileCount' => 1,
                        'overwriteInitial' => FALSE,
                        'initialPreviewAsData' => TRUE,
                        'initialCaption' => isset($model->DokumenHubunganKeluarga) && !empty($model->DokumenHubunganKeluarga) ? $model->DokumenHubunganKeluarga : '',
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
            'NomorKARIS_KARSU',
            'FotoAnggotaKeluarga',
			[
                'attribute' => 'FotoAnggotaKeluarga',
                'value' => FileInput::widget([
                    'model' => $model,
                    'attribute' => 'FotoAnggotaKeluarga',
                    'value' => SikepHelper::getImageUrl($model->FotoAnggotaKeluarga, '@uploadFotoAnakurl'),
                    'options' => [
                        //'accept' => 'image/*',
                        'multiple' => false
                    ],
                    'language' => 'id',
                    'pluginOptions' => [
                        'initialPreview' => [
                            SikepHelper::getImageUrl($model->FotoAnggotaKeluarga, '@uploadFotoAnakurl'),
                        ],
                        'maxFileCount' => 1,
                        'overwriteInitial' => FALSE,
                        'initialPreviewAsData' => TRUE,
                        'initialCaption' => isset($model->FotoAnggotaKeluarga) && !empty($model->FotoAnggotaKeluarga) ? $model->FotoAnggotaKeluarga : '',
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
        ],
    ])
    ?>

</div>
