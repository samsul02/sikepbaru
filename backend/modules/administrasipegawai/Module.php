<?php

namespace backend\modules\administrasipegawai;

/**
 * administrasipegawai module definition class
 */
class Module extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\administrasipegawai\controllers';

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'datapegawai' => [
                'class' => 'backend\modules\administrasipegawai\modules\datapegawai\Module',
            //'defaultRoute' => 'pegawai/index'
            ],
			'jabatanfungsional' => [
            'class' => 'backend\modules\administrasipegawai\modules\jabatanfungsional\Module',
			],
			'pengembanganpegawai' => [
            'class' => 'backend\modules\administrasipegawai\modules\pengembanganpegawai\Module',
			],
        ];
    }

}
