<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TransRiwayatOrganisasi */

$this->title = 'Create Trans Riwayat Organisasi';
$this->params['breadcrumbs'][] = ['label' => 'Trans Riwayat Organisasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-riwayat-organisasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
