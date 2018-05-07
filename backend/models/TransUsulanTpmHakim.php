<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_tpm_hakim".
 *
 * @property int $IdUsulanTPMHakim
 * @property string $NoRegisterUsulanTPMHakim
 * @property string $TanggalUsulanTPMHakim
 * @property string $TahunUsulanTPMHakim
 * @property string $PeriodeUsulanTPMHakim
 * @property int $IdSatkerUsulanTPMHakim
 * @property string $StatusUsulanTPMHakim
 *
 * @property TmstSatker $satkerUsulanTPMHakim
 * @property TransUsulanTpmHakimDetail[] $transUsulanTpmHakimDetail
 */
class TransUsulanTpmHakim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_tpm_hakim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TanggalUsulanTPMHakim', 'TahunUsulanTPMHakim'], 'safe'],
            [['IdSatkerUsulanTPMHakim'], 'integer'],
            [['NoRegisterUsulanTPMHakim'], 'string', 'max' => 100],
            [['PeriodeUsulanTPMHakim'], 'string', 'max' => 10],
            [['StatusUsulanTPMHakim'], 'string', 'max' => 1],
            [['IdSatkerUsulanTPMHakim'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerUsulanTPMHakim' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanTPMHakim' => 'Id Usulan Tpmhakim',
            'NoRegisterUsulanTPMHakim' => 'No Register Usulan Tpmhakim',
            'TanggalUsulanTPMHakim' => 'Tanggal Usulan Tpmhakim',
            'TahunUsulanTPMHakim' => 'Tahun Usulan Tpmhakim',
            'PeriodeUsulanTPMHakim' => 'Periode Usulan Tpmhakim',
            'IdSatkerUsulanTPMHakim' => 'Id Satker Usulan Tpmhakim',
            'StatusUsulanTPMHakim' => 'Status Usulan Tpmhakim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerUsulanTPMHakim()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerUsulanTPMHakim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmHakimDetail()
    {
        return $this->hasMany(TransUsulanTpmHakimDetail::className(), ['IdUsulanTPMHakim' => 'IdUsulanTPMHakim']);
    }
}
