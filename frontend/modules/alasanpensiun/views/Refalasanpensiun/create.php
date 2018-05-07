<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\alasanpensiun\models\Refalasanpensiun */

$this->title = 'Create Refalasanpensiun';
$this->params['breadcrumbs'][] = ['label' => 'Refalasanpensiun', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refalasanpensiun-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
