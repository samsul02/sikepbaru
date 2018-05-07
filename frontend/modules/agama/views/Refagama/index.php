<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\agama\models\RefagamaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Refagama';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refagama-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Refagama', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idAgama',
            'NamaAgama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
