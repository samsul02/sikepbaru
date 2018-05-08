<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TransKegiatanDiklat */

$this->title = 'Update Trans Kegiatan Diklat: ' . $model->IdKegiatanDiklat;
$this->params['breadcrumbs'][] = ['label' => 'Trans Kegiatan Diklat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdKegiatanDiklat, 'url' => ['view', 'id' => $model->IdKegiatanDiklat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trans-kegiatan-diklat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
