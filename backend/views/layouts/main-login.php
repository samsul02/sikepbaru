
<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
backend\assets\AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<header class="jumbotron subhead" id="overview" style="margin-bottom: 0px">
  <div class="container" style="margin-left: 0px">
	<div style="float:left;">
		<img alt="foto-login" src="../img/ma.png">
	</div>
	<div>
		<h2 style="font-family: Segoe UI;">Sistem Informasi Kepegawaian</h2>
		<p style="font-family: Segoe UI;">Mahkamah Agung Republik Indonesia</p>
	</div>
  </div>
</header>
<div id="cssmenu" style="height:15px;"></div>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>


                      
<?php $this->endBody() ?>

</body>
<!--Footer-->
    <!--Copyright-->
    <footer class="footer-login">
        <div class="pull-right hidden-ss">
          <b>Version</b> 2.1.1
        </div>
        Hak Cipta &copy; Mahkamah Agung Republik Indonesia 2018
      </footer>
    <!--/Copyright-->


<!--/Footer-->
</html>
<?php $this->endPage() ?>

