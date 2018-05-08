<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatOrganisasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-riwayat-organisasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdPegawai')->textInput() ?>

    <?= $form->field($model, 'IdStatusMasaOrganisasi')->textInput() ?>

    <?= $form->field($model, 'NamaOrganisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdJabatanOrganisasi')->textInput() ?>

    <?= $form->field($model, 'LokasiOrganisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TahunMulai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TahunSelesai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NamaPimpinanOrganisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KeteranganOrganisasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DokumenOrganisasi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
