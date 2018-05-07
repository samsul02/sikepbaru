<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\alasanpensiun\models\Refalasanpensiun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="refalasanpensiun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'AlasanPensiun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
