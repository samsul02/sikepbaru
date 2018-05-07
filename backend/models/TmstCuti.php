<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_cuti".
 *
 * @property int $IdMasterCuti
 * @property string $TahunMasterCuti
 * @property int $JatahCutiPerTahun
 * @property int $JumlahCutiBersama
 */
class TmstCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TahunMasterCuti', 'JatahCutiPerTahun', 'JumlahCutiBersama'], 'required'],
            [['TahunMasterCuti'], 'safe'],
            [['JatahCutiPerTahun', 'JumlahCutiBersama'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdMasterCuti' => 'Id Master Cuti',
            'TahunMasterCuti' => 'Tahun Master Cuti',
            'JatahCutiPerTahun' => 'Jatah Cuti Per Tahun',
            'JumlahCutiBersama' => 'Jumlah Cuti Bersama',
        ];
    }
}
