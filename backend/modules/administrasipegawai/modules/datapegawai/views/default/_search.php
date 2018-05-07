<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="tmst-pegawai-search">

    <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get',]); ?>

    <div class="row">

        <div class="col-sm-7">
            <?= $form->field($model, 'globalSearch')->label(FALSE)->textInput(['placeholder' => "Ketikkan kata kunci"]) ?>
        </div>

        <div>
            <?php echo Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>            
            <?php echo Html::a('Reset', ['index'], ['class' => 'btn btn-default']); ?>
            <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) //ga nge-reset kata kunci yang dicari    ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
