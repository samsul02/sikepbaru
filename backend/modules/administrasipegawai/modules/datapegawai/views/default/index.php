<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\DatePicker;
use backend\components\widget\GridView;

/**
 * note:
 * 
 * kartik gridview
 * http://demos.krajee.com/grid
 * 
 * kartik datecontrol
 * http://demos.krajee.com/datecontrol
 * 
 * kartik pdf exporting
 * https://www.yiiframework.com/extension/yii2-mpdf
 * 
 */
Url::remember();

$this->title = 'Daftar Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Administrasi Pegawai', 'url' => ['/administrasipegawai/default']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tmst-pegawai-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <div class="row form-group" style="padding:2px;background:#ED6454;"></div>

    <div class="row">
        <div class="col-sm-5">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>        
        <div class="col-sm-1">
            <?= Html::a('Tambah Pegawai', ['pegawai/create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'title' => $this->title,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.',
            ],
            'NIPBaru',
            [
                'attribute' => 'NamaLengkap',
                'value' => function ($model) {
                    return $model->GelarDepan . ' ' . $model->NamaLengkap . ' ' . $model->GelarBelakang;
                },
            //'contentOptions' => ['style' => 'max-width:10%; white-space: normal;'],
            ],
            [
                'attribute' => 'IdJabatan',
                'value' => 'jabatan.KeteranganNamaJabatan',
            ],
            [
                'attribute' => 'TanggalLahir',
                'value' => function ($model) {
                    $tanggal = "-";
                    if ($model->TanggalLahir != '0000-00-00') {
                        //Yii::$app->formatter->locale = 'id-ID';
                        $tanggal = Yii::$app->formatter->asDate($model->TanggalLahir, 'medium');
                    }
                    return $tanggal;
                },
                'format' => 'raw',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'TanggalLahir',
                    'language' => 'id',
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => ['class' => 'form-control'],
                ])
            ],
            [
                'label' => 'Gol.',
                'attribute' => 'KodeGolonganRuang',
                'value' => function ($model) {
                    return $model->kodeGolonganRuang->Golongan . '/' . $model->kodeGolonganRuang->Ruang;
                },
            ],
            //'KodeGolonganRuang',
            //'TanggalLahir',
            //'IdJabatan',
            //'IdPegawai',
            //'NIPLama',            
            //'NIK',
            //'NamaLengkap',
            //'GelarDepan',
            //'GelarBelakang',            
            //'StatusPerkawinan',
            //'JenisPegawai',
            //'StatusPegawai',
            //'Agama',
            //'EmailPegawai:email',
            //'NomorHandphone',
            //'NomorTelepon',
            //'KabupatenTempatLahir',
            //'PropinsiTempatLahir',
            //'JenisKelamin',
            //'GolonganDarah',
            //'TinggiBadan',
            //'BeratBadan',
            //'Rambut',
            //'WarnaKulit',
            //'BentukMuka',
            //'CiriKhusus',
            //'CacatTubuh',
            //'IdSukuBangsa',
            //'DokumenAktaLahir',
            //'KegemaranHobi',            
            //'MasaKerja',
            //'FotoPegawai',
            //'KodeBankPegawai',
            //'NomorRekeningPegawai',
            //'CabangRekeningPegawai',
            //'NamaRekeningPegawai',
            //'FingerprintPegawai:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return Url::to(['view', 'id' => $model->IdPegawai]);
                    } else
                    if ($action === 'update') {
                        return Url::to(['pegawai/update', 'id' => $model->IdPegawai]);
                    } else if ($action === 'delete') {
                        return Url::to(['pegawai/delete', 'id' => $model->IdPegawai]);
                    }
                }
            ],
        ],
    ]);
    ?>

</div>
