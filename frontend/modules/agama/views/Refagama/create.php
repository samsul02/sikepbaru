<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\agama\models\Refagama */

$this->title = 'Create Refagama';
$this->params['breadcrumbs'][] = ['label' => 'Refagama', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refagama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
