<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatJabatan */

$this->title = 'Create Trans Riwayat Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Trans Riwayat Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-riwayat-jabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
