<?php

/**
 * ini view widget GridView, override kartik GridView
 *
 * @author chakoo
 */
use kartik\grid\GridView;
use yii\widgets\Pjax;
?>

<?php if ($params['pjax']): ?>
    <?php Pjax::begin(); ?>
<?php endif; ?>

<?= GridView::widget($params) ?>

<?php if ($params['pjax']): ?>
    <?php Pjax::end(); ?>
<?php endif; ?>
