<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\alasanpensiun\models\Refalasanpensiun */

$this->title = 'Update Refalasanpensiun: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Refalasanpensiun', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAlasanPensiun, 'url' => ['view', 'id' => $model->idAlasanPensiun]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refalasanpensiun-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
