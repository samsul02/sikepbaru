<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatJabatan */

$this->title = 'Update Trans Riwayat Jabatan: ' . $model->IdRiwayatJabatanPegawai;
$this->params['breadcrumbs'][] = ['label' => 'Trans Riwayat Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdRiwayatJabatanPegawai, 'url' => ['view', 'id' => $model->IdRiwayatJabatanPegawai]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trans-riwayat-jabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
