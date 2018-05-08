<?php

namespace backend\modules\administrasipegawai\modules\jabatanfungsional\controllers;

use yii\web\Controller;

/**
 * Default controller for the `jabatanfungsional` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
