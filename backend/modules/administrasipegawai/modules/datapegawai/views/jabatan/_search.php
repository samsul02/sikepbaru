<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatJabatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-riwayat-jabatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdRiwayatJabatanPegawai') ?>

    <?= $form->field($model, 'IdPegawai') ?>

    <?= $form->field($model, 'IdPegawaiAtasan') ?>

    <?= $form->field($model, 'IdSatker') ?>

    <?= $form->field($model, 'TMTJabatanMulai') ?>

    <?php // echo $form->field($model, 'TMTJabatanSelesai') ?>

    <?php // echo $form->field($model, 'IdNamaJabatan') ?>

    <?php // echo $form->field($model, 'IdStrukturOrganisasi') ?>

    <?php // echo $form->field($model, 'TMTEselon') ?>

    <?php // echo $form->field($model, 'AngkaKredit') ?>

    <?php // echo $form->field($model, 'NomorSK') ?>

    <?php // echo $form->field($model, 'TanggalSK') ?>

    <?php // echo $form->field($model, 'PejabatSK') ?>

    <?php // echo $form->field($model, 'IdKPPN') ?>

    <?php // echo $form->field($model, 'LokasiTASPEN') ?>

    <?php // echo $form->field($model, 'DokumenSK') ?>

    <?php // echo $form->field($model, 'TanggalPelantikan') ?>

    <?php // echo $form->field($model, 'NomorSPP') ?>

    <?php // echo $form->field($model, 'TanggalSPP') ?>

    <?php // echo $form->field($model, 'PejabatSPP') ?>

    <?php // echo $form->field($model, 'DokumenSPP') ?>

    <?php // echo $form->field($model, 'TMTSPMT') ?>

    <?php // echo $form->field($model, 'NomorSPMT') ?>

    <?php // echo $form->field($model, 'TanggalSPMT') ?>

    <?php // echo $form->field($model, 'PejabatSPMT') ?>

    <?php // echo $form->field($model, 'DokumenSPMT') ?>

    <?php // echo $form->field($model, 'LembagaPenerbitSKFungsional') ?>

    <?php // echo $form->field($model, 'FlagDiperbantukandiMA') ?>

    <?php // echo $form->field($model, 'FlagDiperbantukandiLuar') ?>

    <?php // echo $form->field($model, 'FlagAssignment') ?>

    <?php // echo $form->field($model, 'FlagAktif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
