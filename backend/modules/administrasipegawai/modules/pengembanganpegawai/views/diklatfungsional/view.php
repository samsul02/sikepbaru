<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TransKegiatanDiklat */

$this->title = $model->IdKegiatanDiklat;
$this->params['breadcrumbs'][] = ['label' => 'Trans Kegiatan Diklat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-kegiatan-diklat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IdKegiatanDiklat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdKegiatanDiklat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IdKegiatanDiklat',
            'NamaKegiatanDiklat',
            'JenisDiklat',
            'LamaDiklat',
            'JadwalDiklat',
            'PenyelenggaraDiklat',
            'LokasiKegiatanDiklat',
            'NegaraKegiatanDiklat',
            'KotaKegiatanDiklat',
        ],
    ]) ?>

</div>
