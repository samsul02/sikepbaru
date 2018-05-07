<?php
/**
 * Created by PhpStorm.
 * User: afm
 * Date: 01/05/18
 * Time: 19:30
 */

namespace backend\controllers;
use Yii;
use yii\base\Controller;
use yii\base\DynamicModel;

class KomponenController extends Controller{
    public function behaviors()
    {
        return parent::behaviors();
    }

    public function actionBasicform()
    {
        $model = new DynamicModel([
            'email','password','dropdown'
        ]);
        $list = new DynamicModel([
            1 => 'Item 1',
            2 => 'Item 2',
            3 => 'Item 3'
        ]);
        return $this->render('vbasicform', ['model' => $model]);
    }

    public function actionAdvanceform()
    {
        $model = new DynamicModel([
            'email','password'
        ]);
        return $this->render('vadvanceform', ['model' => $model]);
    }
}