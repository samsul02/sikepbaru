<?php

namespace backend\components\widget;

use yii\base\Widget;

/**
 * Description of ProfileHeader
 *
 * @author chakoo
 */
class ProfileHeader extends Widget {

    public $modelPegawai;
    public $backUrl;

    public function init() {
        parent::init();
    }

    public function run() {
        return $this->render('_profileHeader', ['model' => $this->modelPegawai, 'backUrl' => $this->backUrl]);
    }

}
