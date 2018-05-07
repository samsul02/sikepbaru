<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_tpm_hakim_detail".
 *
 * @property int $IdUsulanTPMHakimDetil
 * @property int $IdUsulanTPMHakim
 * @property int $IdPegawai
 * @property int $IdNamaJabatan
 * @property int $KodeSatker
 * @property int $IdNamaJabatanUsulan
 * @property int $IdSatkerUsulan
 * @property string $Catatan
 * @property string $DokumenUsulanTPMHakimDetil
 * @property string $Status
 * @property int $IdFitandProperTest
 *
 * @property TmstPegawai $pegawai
 * @property TmstSatker $kodeSatker
 * @property TransUsulanTpmHakim $usulanTPMHakim
 * @property TrefJabatan $namaJabatan
 */
class TransUsulanTpmHakimDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_tpm_hakim_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanTPMHakim', 'IdPegawai', 'IdNamaJabatan'], 'required'],
            [['IdUsulanTPMHakim', 'IdPegawai', 'IdNamaJabatan', 'KodeSatker', 'IdNamaJabatanUsulan', 'IdSatkerUsulan', 'IdFitandProperTest'], 'integer'],
            [['Catatan'], 'string', 'max' => 250],
            [['DokumenUsulanTPMHakimDetil'], 'string', 'max' => 50],
            [['Status'], 'string', 'max' => 1],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['KodeSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['KodeSatker' => 'IdSatker']],
            [['IdUsulanTPMHakim'], 'exist', 'skipOnError' => true, 'targetClass' => TransUsulanTpmHakim::className(), 'targetAttribute' => ['IdUsulanTPMHakim' => 'IdUsulanTPMHakim']],
            [['IdNamaJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdNamaJabatan' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanTPMHakimDetil' => 'Id Usulan Tpmhakim Detil',
            'IdUsulanTPMHakim' => 'Id Usulan Tpmhakim',
            'IdPegawai' => 'Id Pegawai',
            'IdNamaJabatan' => 'Id Nama Jabatan',
            'KodeSatker' => 'Kode Satker',
            'IdNamaJabatanUsulan' => 'Id Nama Jabatan Usulan',
            'IdSatkerUsulan' => 'Id Satker Usulan',
            'Catatan' => 'Catatan',
            'DokumenUsulanTPMHakimDetil' => 'Dokumen Usulan Tpmhakim Detil',
            'Status' => 'Status',
            'IdFitandProperTest' => 'Id Fitand Proper Test',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'KodeSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsulanTPMHakim()
    {
        return $this->hasOne(TransUsulanTpmHakim::className(), ['IdUsulanTPMHakim' => 'IdUsulanTPMHakim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }
}
