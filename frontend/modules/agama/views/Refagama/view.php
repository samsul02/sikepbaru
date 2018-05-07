<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\agama\models\Refagama */

$this->title = $model->idAgama;
$this->params['breadcrumbs'][] = ['label' => 'Refagama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refagama-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idAgama], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idAgama], [
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
            'idAgama',
            'NamaAgama',
        ],
    ]) ?>

</div>
