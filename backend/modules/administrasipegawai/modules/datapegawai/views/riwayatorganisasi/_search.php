<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatOrganisasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-riwayat-organisasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdRiwayatOrganisasi') ?>

    <?= $form->field($model, 'IdPegawai') ?>

    <?= $form->field($model, 'IdStatusMasaOrganisasi') ?>

    <?= $form->field($model, 'NamaOrganisasi') ?>

    <?= $form->field($model, 'IdJabatanOrganisasi') ?>

    <?php // echo $form->field($model, 'LokasiOrganisasi') ?>

    <?php // echo $form->field($model, 'TahunMulai') ?>

    <?php // echo $form->field($model, 'TahunSelesai') ?>

    <?php // echo $form->field($model, 'NamaPimpinanOrganisasi') ?>

    <?php // echo $form->field($model, 'KeteranganOrganisasi') ?>

    <?php // echo $form->field($model, 'DokumenOrganisasi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
