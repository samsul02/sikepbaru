<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatJabatan */

$this->title = $model->IdRiwayatJabatanPegawai;
$this->params['breadcrumbs'][] = ['label' => 'Trans Riwayat Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-riwayat-jabatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdRiwayatJabatanPegawai], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdRiwayatJabatanPegawai], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdRiwayatJabatanPegawai',
            'IdPegawai',
            'IdPegawaiAtasan',
            'IdSatker',
            'TMTJabatanMulai',
            'TMTJabatanSelesai',
            'IdNamaJabatan',
            'IdStrukturOrganisasi',
            'TMTEselon',
            'AngkaKredit',
            'NomorSK',
            'TanggalSK',
            'PejabatSK',
            'IdKPPN',
            'LokasiTASPEN',
            'DokumenSK',
            'TanggalPelantikan',
            'NomorSPP',
            'TanggalSPP',
            'PejabatSPP',
            'DokumenSPP',
            'TMTSPMT',
            'NomorSPMT',
            'TanggalSPMT',
            'PejabatSPMT',
            'DokumenSPMT',
            'LembagaPenerbitSKFungsional',
            'FlagDiperbantukandiMA',
            'FlagDiperbantukandiLuar',
            'FlagAssignment',
            'FlagAktif',
        ],
    ]) ?>

</div>
