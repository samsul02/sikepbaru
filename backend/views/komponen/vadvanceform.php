<?php
/**
 * Created by PhpStorm.
 * User: afm
 * Date: 02/05/18
 * Time: 10:55
 */
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widge

?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Basic Menggunakan ActiveForm</h3>
                        <p>Penggunaan ActiveForm harus memakai model,<pre>$form->field(nama-model, nama atribut/field(sekaligus menjadi label))</pre></p>
                        <a href="https://www.yiiframework.com/extension/yiisoft/yii2-bootstrap/doc/api/2.2/yii-bootstrap-activeform" target="_blank"><p>Dokumentasi activeForm dari yii2</p></a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php $form = kartik\widgets\ActiveForm::begin([
                            'id' => 'advance-form',
                            'enableAjaxValidation' => true,
                            'fieldConfig' => [
                                    'autoPlaceholder' => true
                            ]
                    ]); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?= $form->field($model, 'email', [
                                    'addon' => ['prepend' => ['content' => '<i class="fa fa-envelope"></i>']]
                            ]); ?>
                            <p> Penggunaan icon bisa menggunakan attribute '<code>inputTemplate</code>'<a href="https://www.yiiframework.com/   "></a></p>
                        </div>
                        <div class="form-group">
                            <?= $form->field($model, 'password') ?>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <?php $form = ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <figure class="highlight">
                    <pre><?php show_source('file/contohbasicform.php'); ?></pre>
                </figure>
            </div>
        </div>
    </div>
</div>
