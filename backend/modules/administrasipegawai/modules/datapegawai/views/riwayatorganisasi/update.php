<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatOrganisasi */

$this->title = 'Update Trans Riwayat Organisasi: ' . $model->IdRiwayatOrganisasi;
$this->params['breadcrumbs'][] = ['label' => 'Trans Riwayat Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdRiwayatOrganisasi, 'url' => ['view', 'id' => $model->IdRiwayatOrganisasi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trans-riwayat-organisasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
