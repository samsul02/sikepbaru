<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\alasanpensiun\models\RefalasanpensiunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Refalasanpensiun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refalasanpensiun-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Refalasanpensiun', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idAlasanPensiun',
            'AlasanPensiun',
            'Keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
