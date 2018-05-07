<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\alasanpensiun\models\Refalasanpensiun */

$this->title = $model->idAlasanPensiun;
$this->params['breadcrumbs'][] = ['label' => 'Refalasanpensiun', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refalasanpensiun-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idAlasanPensiun], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idAlasanPensiun], [
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
            'idAlasanPensiun',
            'AlasanPensiun',
            'Keterangan',
        ],
    ]) ?>

</div>
