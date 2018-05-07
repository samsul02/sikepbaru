<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TmstKeluargaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmst-keluarga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdAnggotaKeluarga') ?>

    <?= $form->field($model, 'IDPegawai') ?>

    <?= $form->field($model, 'JenisHubunganKeluarga') ?>

    <?= $form->field($model, 'JenisKelamin') ?>

    <?= $form->field($model, 'NamaAnggotaKeluarga') ?>

    <?php // echo $form->field($model, 'TempatLahirAnggotaKeluarga') ?>

    <?php // echo $form->field($model, 'TanggalLahirAnggotaKeluarga') ?>

    <?php // echo $form->field($model, 'PekerjaanAnggotaKeluarga') ?>

    <?php // echo $form->field($model, 'AlamatKantorAnggotaKeluarga') ?>

    <?php // echo $form->field($model, 'NoIndukPegawaiKeluarga') ?>

    <?php // echo $form->field($model, 'Agama') ?>

    <?php // echo $form->field($model, 'StatusPerkawinan') ?>

    <?php // echo $form->field($model, 'TanggalNikah') ?>

    <?php // echo $form->field($model, 'StatusKesehatan') ?>

    <?php // echo $form->field($model, 'PendidikanTerakhir') ?>

    <?php // echo $form->field($model, 'IsHidup') ?>

    <?php // echo $form->field($model, 'BerhakTunjangan') ?>

    <?php // echo $form->field($model, 'DokumenHubunganKeluarga') ?>

    <?php // echo $form->field($model, 'NomorKARIS_KARSU') ?>

    <?php // echo $form->field($model, 'FotoAnggotaKeluarga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
