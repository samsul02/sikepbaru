<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TransKegiatanDiklat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trans-kegiatan-diklat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NamaKegiatanDiklat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JenisDiklat')->textInput() ?>

    <?= $form->field($model, 'LamaDiklat')->textInput() ?>

    <?= $form->field($model, 'JadwalDiklat')->textInput() ?>

    <?= $form->field($model, 'PenyelenggaraDiklat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LokasiKegiatanDiklat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NegaraKegiatanDiklat')->textInput() ?>

    <?= $form->field($model, 'KotaKegiatanDiklat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
