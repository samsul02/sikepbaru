<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
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
            'IdAnggotaKeluarga',
            'IDPegawai',
            'JenisHubunganKeluarga',
            'JenisKelamin',
            'NamaAnggotaKeluarga',
            'TempatLahirAnggotaKeluarga',
            'TanggalLahirAnggotaKeluarga',
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
            'NomorKARIS_KARSU',
            'FotoAnggotaKeluarga',
        ],
    ])
    ?>

</div>
