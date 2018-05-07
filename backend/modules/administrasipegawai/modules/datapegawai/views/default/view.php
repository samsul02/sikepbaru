<?php

use backend\components\SikepHelper;
use yii\helpers\Html;
use backend\components\widget\ProfileHeader;

/**
 * note:
 * $id => id pegawai
 */
$this->title = 'Profil Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'Administrasi Pegawai', 'url' => ['/administrasipegawai/default']];
$this->params['breadcrumbs'][] = ['label' => 'Daftar Pegawai', 'url' => ['/administrasipegawai/datapegawai']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= ProfileHeader::widget($profileParams) ?>

<div class="row form-group"> 
    <h3>Data Pokok</h3>
</div>

<div class="row form-group">            
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/biodata.png', [
                        'alt' => 'Biodata',
                        'width' => '64px',
                    ]), ['pegawai/view?id=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Biodata</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/pasangan.png', [
                        'alt' => 'Pasangan',
                        'width' => '64px'
                    ]), ['pasangan/index?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Pasangan</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/anak.png', [
                        'alt' => 'Anak',
                        'width' => '64px'
                    ]), ['anak/index?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Anak</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/orang_tua.png', [
                        'alt' => 'Orang Tua',
                        'width' => '64px'
                    ]), ['ortu/index?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Orang Tua</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/kerabat.png', [
                        'alt' => 'Kerabat',
                        'width' => '64px'
                    ]), ['kerabat/index?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Kerabat</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/kerabat.png', [
                        'alt' => 'Saudara',
                        'width' => '64px'
                    ]), ['saudara/index?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Saudara Kandung</figcaption>
        </figure>
    </div>
</div>

<div class="row form-group"> 
    <h3>Riwayat Pekerjaan</h3>
</div>

<div class="row form-group">            
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/cpns.png', [
                        'alt' => 'CPNS',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>CPNS</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/pns.png', [
                        'alt' => 'PNS',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>PNS</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/pangkat.png', [
                        'alt' => 'Pangkat',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Pangkat</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/jabatan.png', [
                        'alt' => 'Jabatan',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Jabatan</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/fungsional.png', [
                        'alt' => 'Fungsional',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Fungsional</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/sanksi.png', [
                        'alt' => 'Sanksi',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Sanksi</figcaption>
        </figure>
    </div>
</div>
<div class="row form-group">
    <div class="col-sm-2 col-sm-offset-3">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/kgb.png', [
                        'alt' => 'KGB',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>KGB</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/pensiun.png', [
                        'alt' => 'Pensiun/Berhenti',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Pensiun/Berhenti</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/pmk.png', [
                        'alt' => 'Peninjauan Masa Kerja',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Peninjauan Masa Kerja</figcaption>
        </figure>
    </div>
</div>

<div class="row form-group"> 
    <h3>Riwayat Pendidikan</h3>
</div>

<div class="row form-group">            
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/pendidikan.png', [
                        'alt' => 'Pendidikan',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Pendidikan</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/penghargaan.png', [
                        'alt' => 'Penghargaan',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Penghargaan</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/tugas_belajar.png', [
                        'alt' => 'Tugas Belajar',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Tugas Belajar</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/seminar.png', [
                        'alt' => 'Seminar',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Seminar</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/organisasi.png', [
                        'alt' => 'Organisasi',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Organisasi</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/luar_negeri.png', [
                        'alt' => 'Luar Negeri',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Luar Negeri</figcaption>
        </figure>
    </div>
</div>

<div class="row form-group"> 
    <h3>Riwayat Diklat</h3>
</div>

<div class="row form-group">            
    <div class="col-sm-2 col-sm-offset-1">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/prajab.png', [
                        'alt' => 'Diklat Pra Jabatan',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Diklat Pra Jabatan</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/penjenjangan.png', [
                        'alt' => 'Diklat Penjenjangan',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Diklat Penjenjangan</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/diklat_teknis.png', [
                        'alt' => 'Diklat Teknis',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Diklat Teknis</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/diklat_fungsional.png', [
                        'alt' => 'Diklat Fungsional',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>Diklat Fungsional</figcaption>
        </figure>
    </div>
    <div class="col-sm-2">
        <figure class="text-center">
            <?=
            Html::a(Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/dp3.png', [
                        'alt' => 'DP3',
                        'width' => '64px'
                    ]), ['view?idPegawai=' . $id], ['class' => 'item-hover']);
            ?>
            <figcaption>DP3</figcaption>
        </figure>
    </div>
</div>