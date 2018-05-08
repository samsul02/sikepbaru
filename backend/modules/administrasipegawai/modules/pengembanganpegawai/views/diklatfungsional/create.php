<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TransKegiatanDiklat */

$this->title = 'Create Trans Kegiatan Diklat';
$this->params['breadcrumbs'][] = ['label' => 'Trans Kegiatan Diklat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trans-kegiatan-diklat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
