<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>


<div class="login-box">
  <div class="login-logo">
    Sistem Informasi Kepegawaian
	<br>
	Mahkamah Agung Republik Indonesia
	<br>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
      <div class="form-group has-feedback" style="background-color:#FFF;">
        <?= $form->field($model, 'username', 
        	['template' => '
   			      {input}
   			  		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
   			    	{error}{hint}'
   			  ])->textInput(['class'=>'form-control','placeholder' => 'Username']); 
   			?>
      </div>
      <div class="form-group has-feedback">
        <?= $form->field($model, 'password', 
        	['template' => '
   			      {input}
   			  		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
   			    	{error}{hint}'
   			  ])->passwordInput(['class'=>'form-control','placeholder' => 'Password']); 
   			?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </label>
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <?= Html::submitButton('Login', ['class' => 'btn bg-maroon btn-block', 'name' => 'login-button']) ?>
        </div><!-- /.col -->
      </div>
    <?php ActiveForm::end(); ?>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box 
