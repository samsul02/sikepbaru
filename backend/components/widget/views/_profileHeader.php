<?php

/**
 * ini view widget header profile pegawai
 *
 * @author chakoo
 */
use yii\helpers\Html;
use backend\components\SikepHelper;
?>

<div class="profile-header">
    <div class="row form-group"> 
        <div class="col-sm-2">
            <div style="border-right: 1px solid #333;">

                <?=
                Html::img(SikepHelper::getImageUrl($model->FotoPegawai, '@uploadfotopegawaiurl'), [
                    'alt' => 'Foto Pegawai',
                    'height' => '140px',
                ]);
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <p class="header-pegawai-name"><?= $model->GelarDepan . ' ' . $model->NamaLengkap . ' ' . $model->GelarBelakang; ?></p>
            <span><?= (!empty($model->jabatan) ? $model->jabatan->KeteranganNamaJabatan : '-') . ', ' . (isset($model->transRiwayatJabatan) ? $model->transRiwayatJabatan->satker->NamaSatker : '-') ?></span><br/>
            <span><?= !empty($model->kodeGolonganRuang) ? ($model->kodeGolonganRuang->NamaGolongan . ' (' . $model->kodeGolonganRuang->Golongan . '/' . $model->kodeGolonganRuang->Ruang . ')') : '-' ?></span><br/><br/>
            <span><?= $model->NIPBaru . ' / ' . $model->NIPLama ?></span><br/>
            <span><?= (!empty($model->kabupatenTempatLahir) ? $model->kabupatenTempatLahir->NamaKabupaten : '-') . ', ' . (($model->TanggalLahir != '0000-00-00' && $model->TanggalLahir != '0001-11-30') ? Yii::$app->formatter->asDate($model->TanggalLahir, 'php:d F Y') : '-') ?></span>
        </div>
        <div class="bottom-align-text">
            <?php
            $iconHp = Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/phone.png', [
                        'alt' => 'Phone',
                        'height' => '14px',
            ]);
            $hp = !empty($model->NomorHandphone) ? $model->NomorHandphone : 'Tidak Ada';
            $iconEmail = Html::img(SikepHelper::getAlias('@assetsdatapegawai') . '/email.png', [
                        'alt' => 'Email',
                        'height' => '14px',
            ]);
            $email = !empty($model->EmailPegawai) ? $model->EmailPegawai : 'Tidak Ada';
            ?>
            <span class="align-bottom">
                <?= $iconHp . $hp . ' ' . $iconEmail . $email ?>
            </span>
        </div>
    </div>
    <div class="row form-group" style="padding:2px;background:#ED6454;"></div>
</div>

<?php if (!is_null($backUrl)): ?>
    <div class="row form-group">
        <?= Html::a('Kembali', $backUrl, ['class' => 'btn btn-default pull-right']) ?>
    </div>
<?php endif; ?>