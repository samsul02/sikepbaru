<?php

use yii\helpers\Html;
use backend\components\widget\GridView;
use backend\components\widget\ProfileHeader;
use kartik\detail\DetailView;
use yii\jui\DatePicker;

$this->title = 'Anak';
$this->params['breadcrumbs'][] = ['label' => 'Administrasi Pegawai', 'url' => ['/administrasipegawai/default']];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pegawai', 'url' => ['/administrasipegawai/datapegawai']];
$this->params['breadcrumbs'][] = $this->title;
//test edit
?>

<?= ProfileHeader::widget($profileParams) ?>

<div class="tmst-keluarga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Anak', ['create?idPegawai=' . $idPegawai], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'title' => $this->title,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'IdAnggotaKeluarga',
            //'IDPegawai',
            //'JenisHubunganKeluarga',
            //'JenisKelamin',
            'NamaAnggotaKeluarga',
            //[
            //	'attribute'=>'NamaAnggotaKeluarga',
            //	'label'=>'Nama Anggota Keluarga'
            //],
            'TempatLahirAnggotaKeluarga',
            [
                'attribute' => 'TanggalLahirAnggotaKeluarga',
                'value' => function ($model) {
                    $tanggal = "-";
                    if ($model->TanggalLahirAnggotaKeluarga != '0000-00-00') {
                        //Yii::$app->formatter->locale = 'id-ID';
                        $tanggal = Yii::$app->formatter->asDate($model->TanggalLahirAnggotaKeluarga, 'medium');
                    }
                    return $tanggal;
                },
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'TanggalLahirAnggotaKeluarga',
                    'language' => 'id',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control'],
                ])
            ],
            'PekerjaanAnggotaKeluarga',
            //'AlamatKantorAnggotaKeluarga',
            //'NoIndukPegawaiKeluarga',
            //'Agama',
            //'StatusPerkawinan',
            //'TanggalNikah',
            //'StatusKesehatan',
            //'PendidikanTerakhir',
            //'IsHidup',
            //'BerhakTunjangan',
            //'DokumenHubunganKeluarga',
            //'NomorKARIS_KARSU',
            //'FotoAnggotaKeluarga',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
