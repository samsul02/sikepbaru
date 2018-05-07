<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use backend\components\SikepHelper;
use backend\components\widget\DatePicker;
use backend\components\widget\DropdownSearch;
use backend\components\widget\FileInput;
use kartik\form\ActiveForm;
use backend\models\TrefAgama;
use backend\models\TrefBank;
use backend\models\TrefBentukMuka;
use backend\models\TrefGolonganDarah;
use backend\models\TrefGolonganRuang;
use backend\models\TrefJenisPegawai;
use backend\models\TrefKabupaten;
use backend\models\TrefPropinsi;
use backend\models\TrefRambut;
use backend\models\TrefStatusPegawai;
use backend\models\TrefStatusPerkawinan;
use backend\models\TrefSukubangsa;
use backend\models\TrefWarnaKulit;

/**
 * 
 * kartik's activeform
 * https://github.com/kartik-v/yii2-widget-activeform
 * 
 */
?>

<div class="tmst-pegawai-form">

    <?php $isNewRecord = $model->isNewRecord; ?>

    <?php
    $form = ActiveForm::begin([
                'type' => ActiveForm::TYPE_HORIZONTAL,
                'class' => 'form-horizontal',
                'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

    <?=
    $form->field($model, 'JenisPegawai')->dropDownList(
            ArrayHelper::map(TrefJenisPegawai::find()->orderBy('NamaJenisPegawai ASC')->all(), 'IdJenisPegawai', 'NamaJenisPegawai'), ['prompt' => 'Pilih jenis pegawai']
    )
    ?>

    <?= $form->field($model, 'NIPLama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIPBaru')->textInput(['maxlength' => true])->label('NIP Baru') ?>

    <?= $form->field($model, 'NIK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GelarDepan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NamaLengkap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GelarBelakang')->textInput(['maxlength' => true]) ?>

    <?=
    DropdownSearch::widget([
        'attribute' => 'KodeGolonganRuang',
        'form' => $form,
        'model' => $model,
        'placeholder' => 'Pilih golongan ruang',
        'data' => ArrayHelper::map(TrefGolonganRuang::find()->orderBy('NamaGolongan ASC')->all(), 'IdGolonganRuang', function($model) {
                    $golRuang = (!empty($model->Golongan) && !empty($model->Ruang) ? ' (' . $model->Golongan . '/' . $model->Ruang . ')' : '');
                    return $model->NamaGolongan . $golRuang;
                }),
    ])
    ?>

    <?=
    $form->field($model, 'StatusPerkawinan')->dropDownList(
            ArrayHelper::map(TrefStatusPerkawinan::find()->orderBy('NamaStatusKawin ASC')->all(), 'IdStatusKawin', 'NamaStatusKawin'), ['prompt' => 'Pilih status perkawinan']
    )
    ?>

    <?=
    $form->field($model, 'StatusPegawai')->dropDownList(
            ArrayHelper::map(TrefStatusPegawai::find()->orderBy('StatusPegawai ASC')->all(), 'IdStatusPegawai', 'StatusPegawai'), ['prompt' => 'Pilih status pegawai']
    )
    ?>

    <?php
    if (!$isNewRecord) {
        echo $form->field($model, 'Agama')->dropDownList(
                ArrayHelper::map(TrefAgama::find()->orderBy('NamaAgama ASC')->all(), 'IdAgama', 'NamaAgama'), ['prompt' => 'Pilih agama']
        );

        echo $form->field($model, 'EmailPegawai')->textInput(['maxlength' => true]);

        echo $form->field($model, 'NomorHandphone')->textInput(['maxlength' => true]);

        echo $form->field($model, 'NomorTelepon')->textInput(['maxlength' => true]);
    }
    ?>

    <?=
    DatePicker::widget([
        'attribute' => 'TanggalLahir',
        'form' => $form,
        'model' => $model,
    ]);
    ?>

    <?=
    DropdownSearch::widget([
        'id' => 'dropdown-kabupaten',
        'form' => $form,
        'model' => $model,
        'attribute' => 'KabupatenTempatLahir',
        'placeholder' => 'Pilih kabupaten',
        'data' => ArrayHelper::map(TrefKabupaten::find()->orderBy('NamaKabupaten ASC')->all(), 'IdKabupaten', 'NamaKabupaten'),
    ])
    ?>

    <?php
    echo $form->field($model, 'PropinsiTempatLahir')->dropDownList(
            ArrayHelper::map(TrefPropinsi::find()->orderBy('NamaPropinsi ASC')->all(), 'IdPropinsi', 'NamaPropinsi'), [
        'prompt' => 'Pilih propinsi',
        'id' => 'dropdown-propinsi',
        'disabled' => 'disabled'
    ]);

    echo Html::activeHiddenInput($model, 'intIdPropinsi', ['id' => 'hidden-propinsi']);
    /**
     * note: karena field PropinsiTempatLahir diisi valuenya secara otomatis pake ajax
     * dan di-disable, dia ga nge-post value ke controller. 
     * Jadi perlu hidden field buat nyimpen value yg akan dikirim ke controller.
     * Di controller, value ini di-assign secara manual ke $model->PropinsiTempatLahir
     */
    ?>

    <?php
    if (!$isNewRecord) {
        echo $form->field($model, 'JenisKelamin')->dropDownList(['Pria' => 'Pria', 'Wanita' => 'Wanita',], ['prompt' => 'Pilih jenis kelamin']);

        echo $form->field($model, 'TinggiBadan')->textInput();

        echo $form->field($model, 'BeratBadan')->textInput();

        echo $form->field($model, 'Rambut')->dropDownList(
                ArrayHelper::map(TrefRambut::find()->orderBy('NamaJenisRambut ASC')->all(), 'IdJenisRambut', 'NamaJenisRambut'), ['prompt' => 'Pilih jenis rambut']
        );

        echo $form->field($model, 'WarnaKulit')->dropDownList(
                ArrayHelper::map(TrefWarnaKulit::find()->orderBy('NamaWarnaKulit ASC')->all(), 'IdWarnaKulit', 'NamaWarnaKulit'), ['prompt' => 'Pilih warna kulit']
        );

        echo $form->field($model, 'BentukMuka')->dropDownList(
                ArrayHelper::map(TrefBentukMuka::find()->orderBy('NamaBentukMuka ASC')->all(), 'IdBentukMuka', 'NamaBentukMuka'), ['prompt' => 'Pilih bentuk muka']
        );

        echo $form->field($model, 'CiriKhusus')->textInput(['maxlength' => true]);

        echo $form->field($model, 'CacatTubuh')->textInput(['maxlength' => true]);

        echo $form->field($model, 'IdSukuBangsa')->dropDownList(
                ArrayHelper::map(TrefSukubangsa::find()->orderBy('NamaSukuBangsa ASC')->all(), 'IdSukuBangsa', 'NamaSukuBangsa'), ['prompt' => 'Pilih suku bangsa']
        );

        echo $form->field($model, 'KegemaranHobi')->textInput(['maxlength' => true]);

        echo $form->field($model, 'GolonganDarah')->dropDownList(
                ArrayHelper::map(TrefGolonganDarah::find()->orderBy('NamaGolonganDarah ASC')->all(), 'IdGolonganDarah', 'NamaGolonganDarah'), ['prompt' => 'Pilih golongan darah']
        );
    }
    ?>

    <?php
    //echo $form->field($model, 'IdJabatan')->textInput();
    /*
     * note: kamus data SIKEP hal.14
     * IdJabatan diisi dengan trigger dan SP saat ada isian baru di riwayat jabatan
     * 
     */
    ?>

    <?= $form->field($model, 'MasaKerja')->textInput(['maxlength' => true]) ?>

    <?php
    if (!$isNewRecord) {
        echo FileInput::widget([
            'attribute' => 'fileAktaPegawai',
            'form' => $form,
            'model' => $model,
            'initialPreview' => [
                SikepHelper::getImageUrl($model->DokumenAktaLahir, '@uploadaktapegawaiurl'),
            ],
            'initialCaption' => isset($model->DokumenAktaLahir) && !empty($model->DokumenAktaLahir) ? $model->DokumenAktaLahir : '',
            'deleteUrl' => 'delete-image?id=' . $model->IdPegawai . '&prefix=' . Yii::$app->params['prefixFileAkta'] . '&filename=' . $model->DokumenAktaLahir,
        ]);

        echo FileInput::widget([
            'attribute' => 'fileFotoPegawai',
            'form' => $form,
            'model' => $model,
            'initialPreview' => [
                SikepHelper::getImageUrl($model->FotoPegawai, '@uploadfotopegawaiurl'),
            ],
            'initialCaption' => isset($model->FotoPegawai) && !empty($model->FotoPegawai) ? $model->FotoPegawai : '',
            'deleteUrl' => 'delete-image?id=' . $model->IdPegawai . '&prefix=' . Yii::$app->params['prefixFileFoto'] . '&filename=' . $model->FotoPegawai,
        ]);

//        echo $form->field($model, 'fileFotoPegawai')->widget(FileInput::classname(), [
//            'resizeImages' => TRUE,
//            'options' => ['accept' => 'image/*'],
//            'language' => 'id',
//            'pluginOptions' => [
//                'maxImageWidth' => 200,
//                'maxImageHeight' => 300,
//                'maxFileCount' => 1,
//                'allowedFileExtensions' => ['jpg', 'png'],
//                'initialPreview' => [
//                    SikepHelper::getImageUrl($model->FotoPegawai, '@uploadfotopegawaiurl'),
//                ],
//                'initialPreviewAsData' => TRUE,
//                'initialCaption' => isset($model->FotoPegawai) && !empty($model->FotoPegawai) ? $model->FotoPegawai : '',
//                'maxFileSize' => 2000,
//                'showRemove' => FALSE,
//                'showUpload' => FALSE,
//                'deleteUrl' => 'delete-image?id=' . $model->IdPegawai . '&prefix=' . Yii::$app->params['prefixFileFoto'] . '&filename=' . $model->FotoPegawai,
//            ]
//        ]);

        echo DropdownSearch::widget([
            'form' => $form,
            'model' => $model,
            'attribute' => 'KodeBankPegawai',
            'placeholder' => 'Pilih bank',
            'data' => ArrayHelper::map(TrefBank::find()->orderBy('NamaBank ASC')->all(), 'IdBank', 'NamaBank'),
        ]);

        echo $form->field($model, 'NomorRekeningPegawai')->textInput(['maxlength' => true]);

        echo $form->field($model, 'CabangRekeningPegawai')->textInput(['maxlength' => true]);

        echo $form->field($model, 'NamaRekeningPegawai')->textInput(['maxlength' => true]);

        echo $form->field($model, 'FingerprintPegawai')->textarea(['rows' => 6]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>