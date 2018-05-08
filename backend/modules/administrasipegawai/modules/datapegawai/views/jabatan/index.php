<?php

use yii\helpers\Html;

use backend\components\widget\GridView;
use backend\components\widget\ProfileHeader;
use kartik\detail\DetailView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TransRiwayatJabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Administrasi Pegawai', 'url' => ['/administrasipegawai/default']];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pegawai', 'url' => ['/administrasipegawai/datapegawai']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-riwayat-jabatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Riwayat Jabatan', ['create?idPegawai=' . $idPegawai], ['class' => 'btn btn-success']) ?>		
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'IdRiwayatJabatanPegawai',
            //'IdPegawai',
            'IdNamaJabatan',
			'IdSatker',
			'IdPegawaiAtasan',
            'TMTJabatanMulai',
            'TMTJabatanSelesai',
            
            //'IdStrukturOrganisasi',
            //'TMTEselon',
            //'AngkaKredit',
            //'NomorSK',
            //'TanggalSK',
            //'PejabatSK',
            //'IdKPPN',
            //'LokasiTASPEN',
            //'DokumenSK',
            //'TanggalPelantikan',
            //'NomorSPP',
            //'TanggalSPP',
            //'PejabatSPP',
            //'DokumenSPP',
            //'TMTSPMT',
            //'NomorSPMT',
            //'TanggalSPMT',
            //'PejabatSPMT',
            //'DokumenSPMT',
            //'LembagaPenerbitSKFungsional',
            //'FlagDiperbantukandiMA',
            //'FlagDiperbantukandiLuar',
            //'FlagAssignment',
            //'FlagAktif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
