<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatJabatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-riwayat-jabatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdPegawai')->textInput() ?>

    <?= $form->field($model, 'IdPegawaiAtasan')->textInput() ?>

    <?= $form->field($model, 'IdSatker')->textInput() ?>

    <?= $form->field($model, 'TMTJabatanMulai')->textInput() ?>

    <?= $form->field($model, 'TMTJabatanSelesai')->textInput() ?>

    <?= $form->field($model, 'IdNamaJabatan')->textInput() ?>

    <?= $form->field($model, 'IdStrukturOrganisasi')->textInput() ?>

    <?= $form->field($model, 'TMTEselon')->textInput() ?>

    <?= $form->field($model, 'AngkaKredit')->textInput() ?>

    <?= $form->field($model, 'NomorSK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TanggalSK')->textInput() ?>

    <?= $form->field($model, 'PejabatSK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdKPPN')->textInput() ?>

    <?= $form->field($model, 'LokasiTASPEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DokumenSK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TanggalPelantikan')->textInput() ?>

    <?= $form->field($model, 'NomorSPP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TanggalSPP')->textInput() ?>

    <?= $form->field($model, 'PejabatSPP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DokumenSPP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TMTSPMT')->textInput() ?>

    <?= $form->field($model, 'NomorSPMT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TanggalSPMT')->textInput() ?>

    <?= $form->field($model, 'PejabatSPMT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DokumenSPMT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LembagaPenerbitSKFungsional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FlagDiperbantukandiMA')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'FlagDiperbantukandiLuar')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'FlagAssignment')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'FlagAktif')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
