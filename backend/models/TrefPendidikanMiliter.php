<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_pendidikan_militer".
 *
 * @property int $IdPendidikanMilter
 * @property string $JenisPendidikanMiliter
 * @property string $NamaPendidikanMiliter
 */
class TrefPendidikanMiliter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_pendidikan_militer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JenisPendidikanMiliter', 'NamaPendidikanMiliter'], 'required'],
            [['JenisPendidikanMiliter', 'NamaPendidikanMiliter'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPendidikanMilter' => 'Id Pendidikan Milter',
            'JenisPendidikanMiliter' => 'Jenis Pendidikan Militer',
            'NamaPendidikanMiliter' => 'Nama Pendidikan Militer',
        ];
    }
}
