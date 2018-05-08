<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_pensiun".
 *
 * @property int $IdUsulanPensiun
 * @property string $TanggalUsulanPensiun
 * @property string $PeriodeUsulanPensiun
 * @property string $StatusUsulanPensiun
 */
class TransUsulanPensiun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trans_usulan_pensiun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TanggalUsulanPensiun', 'PeriodeUsulanPensiun', 'StatusUsulanPensiun'], 'required'],
            [['TanggalUsulanPensiun'], 'safe'],
            [['PeriodeUsulanPensiun', 'StatusUsulanPensiun'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPensiun' => 'Id Usulan Pensiun',
            'TanggalUsulanPensiun' => 'Tanggal Usulan Pensiun',
            'PeriodeUsulanPensiun' => 'Periode Usulan Pensiun',
            'StatusUsulanPensiun' => 'Status Usulan Pensiun',
        ];
    }
}
