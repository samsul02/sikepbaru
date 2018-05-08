<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransKegiatanDiklatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-kegiatan-diklat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdKegiatanDiklat') ?>

    <?= $form->field($model, 'NamaKegiatanDiklat') ?>

    <?= $form->field($model, 'JenisDiklat') ?>

    <?= $form->field($model, 'LamaDiklat') ?>

    <?= $form->field($model, 'JadwalDiklat') ?>

    <?php // echo $form->field($model, 'PenyelenggaraDiklat') ?>

    <?php // echo $form->field($model, 'LokasiKegiatanDiklat') ?>

    <?php // echo $form->field($model, 'NegaraKegiatanDiklat') ?>

    <?php // echo $form->field($model, 'KotaKegiatanDiklat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
