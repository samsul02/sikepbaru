<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\TrefHubunganKeluarga;
use yii\jui\DatePicker;
use backend\components\SikepHelper;
//use backend\components\widget\DatePicker;
use backend\components\widget\DropdownSearch;
use backend\components\widget\FileInput;
use backend\models\TrefStatusPerkawinan;
use backend\models\TrefPekerjaan;
use backend\models\TrefAgama;
use backend\models\TrefTingkatPendidikan;

/* @var $this yii\web\View */
/* @var $model backend\models\TmstKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tmst-keluarga-form">

    <?php $isNewRecord = $model->isNewRecord; ?>


    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'class' => 'form-horizontal',
                'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>

<?php // echo $form->field($model, 'IDPegawai')->textInput();  ?>


    <?=
    $form->field($model, 'JenisHubunganKeluarga')->dropDownList(
            ArrayHelper::map(TrefHubunganKeluarga::find()->orderBy('JenisHubunganKeluarga ASC')->all(), 'IdHubunganKeluarga', 'JenisHubunganKeluarga'), ['prompt' => 'Pilih Hubungan Keluarga']
    )
    ?>


<?= $form->field($model, 'NamaAnggotaKeluarga')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'TempatLahirAnggotaKeluarga')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'TanggalLahirAnggotaKeluarga')->widget(DatePicker::class, [
        //'language' => 'id', //note: kalo dijadiin indonesia, error pas saving
        'dateFormat' => 'php:d F Y',
        //'dateFormat' => 'yyyy-MM-dd',
        'options' => [
            'class' => 'form-control',
        ],
        'clientOptions' => [
            'changeYear' => TRUE,
            'changeMonth' => TRUE,
            'yearRange' => '1901:2099',
            'minDate' => '-80Y', //note: 80 tahun ke belakang only
            'maxDate' => '+0Y',
        ],
    ])
    ?>
    <?php
    if (!$isNewRecord) {

        //echo $form->field($model, 'TanggalLahirAnggotaKeluarga')->textInput();

        echo $form->field($model, 'JenisKelamin')->dropDownList(['Pria' => 'Pria', 'Wanita' => 'Wanita',], ['prompt' => 'Pilih Jenis Kelamin']);

        //echo $form->field($model, 'PekerjaanAnggotaKeluarga')->textInput();
        ?>
        <?=
        $form->field($model, 'PekerjaanAnggotaKeluarga')->dropDownList(
                ArrayHelper::map(TrefPekerjaan::find()->orderBy('NamaPekerjaan ASC')->all(), 'IdPekerjaan', 'NamaPekerjaan'), ['prompt' => 'Pilih Pekerjaan']
        )
        ?>
        <?php
        echo $form->field($model, 'AlamatKantorAnggotaKeluarga')->textInput(['maxlength' => true]);

        echo $form->field($model, 'NoIndukPegawaiKeluarga')->textInput();
        ?>
        <?=
        $form->field($model, 'Agama')->dropDownList(
                ArrayHelper::map(TrefAgama::find()->orderBy('NamaAgama ASC')->all(), 'IdAgama', 'NamaAgama'), ['prompt' => 'Pilih Agama']
        )

        //echo $form->field($model, 'Agama')->textInput();
        ?>
        <?php
    }
    ?>




    <?=
    $form->field($model, 'StatusPerkawinan')->dropDownList(
            ArrayHelper::map(TrefStatusPerkawinan::find()->orderBy('NamaStatusKawin ASC')->all(), 'IdStatusKawin', 'NamaStatusKawin'), ['prompt' => 'Pilih Status Perkawinan']
    )
    ?>


    <?php
    if (!$isNewRecord) {
        echo $form->field($model, 'TanggalNikah')->textInput();

        echo $form->field($model, 'StatusKesehatan')->textInput(['maxlength' => true]);
        ?>
        <?=
        $form->field($model, 'PendidikanTerakhir')->dropDownList(
                ArrayHelper::map(TrefTingkatPendidikan::find()->orderBy('DeskripsiTingkatPendidikan ASC')->all(), 'IdRefTingkatPendidikan', 'DeskripsiTingkatPendidikan'), ['prompt' => 'Pilih Pendidikan Terakhis']
        )

        //echo $form->field($model, 'PendidikanTerakhir')->textInput();
        ?>
        <?php
    }
    ?> 

    <?= $form->field($model, 'IsHidup')->dropDownList(['Y' => 'Ya', 'N' => 'Tidak',], ['prompt' => 'Pilih Yang Bersangkutan Masih Hidup atau Tidak']) ?>

    <?= $form->field($model, 'BerhakTunjangan')->dropDownList(['Y' => 'Ya', 'N' => 'Tidak',], ['prompt' => 'Pilih Yang Bersangkutan Berhak Menerima Tunjangan atau Tidak']) ?>

    <?php
    //if (!$isNewRecord) {
      //  echo $form->field($model, 'DokumenHubunganKeluarga')->textInput(['maxlength' => true]);
    //}
    ?>
    <?php
    if (!$isNewRecord) {
        echo FileInput::widget([
            'attribute' => 'fileDokumenAnak',
            'form' => $form,
            'model' => $model,
            'initialPreview' => [
                SikepHelper::getImageUrl($model->DokumenHubunganKeluarga, '@uploadAktaAnakurl'),
            ],
            'initialCaption' => isset($model->DokumenHubunganKeluarga) && !empty($model->DokumenHubunganKeluarga) ? $model->DokumenHubunganKeluarga : '',
            'deleteUrl' => 'delete-image?id=' . $model->IdAnggotaKeluarga . '&prefix=' . Yii::$app->params['prefixFileAktaAnak'] . '&filename=' . $model->DokumenHubunganKeluarga,
        ]);
		
        ?>
        <?php
        echo $form->field($model, 'NomorKARIS_KARSU')->textInput(['maxlength' => true]);

        echo $form->field($model, 'FotoAnggotaKeluarga')->textInput(['maxlength' => true]);
		
		echo FileInput::widget([
            'attribute' => 'fileFotoAnak',
            'form' => $form,
            'model' => $model,
            'initialPreview' => [
                SikepHelper::getImageUrl($model->FotoAnggotaKeluarga, '@uploadFotoAnakurl'),
            ],
            'initialCaption' => isset($model->FotoAnggotaKeluarga) && !empty($model->FotoAnggotaKeluarga) ? $model->FotoAnggotaKeluarga : '',
            'deleteUrl' => 'delete-image?id=' . $model->IdAnggotaKeluarga . '&prefix=' . Yii::$app->params['prefixFileFotoAnak'] . '&filename=' . $model->FotoAnggotaKeluarga,
        ]);
    }
    ?>

    <div class="form-group">
<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>