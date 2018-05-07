<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_pensiun".
 *
 * @property int $IdUsulanPensiun
 * @property int $TanggalUsulanPensiun
 * @property string $PeriodeUsulanPensiun
 * @property string $StatusUsulanPensiun
 *
 * @property TmstPegawai $tanggalUsulanPensiun
 */
class TransUsulanPensiun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_pensiun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TanggalUsulanPensiun', 'PeriodeUsulanPensiun', 'StatusUsulanPensiun'], 'required'],
            [['TanggalUsulanPensiun'], 'integer'],
            [['PeriodeUsulanPensiun', 'StatusUsulanPensiun'], 'string', 'max' => 30],
            [['TanggalUsulanPensiun'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['TanggalUsulanPensiun' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTanggalUsulanPensiun()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'TanggalUsulanPensiun']);
    }
}
