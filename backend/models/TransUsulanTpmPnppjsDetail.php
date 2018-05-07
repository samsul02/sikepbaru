<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_tpm_pnppjs_detail".
 *
 * @property int $IdUsulanTPMPNPPJSDetil
 * @property int $IdUsulanTPMPNPPJS
 * @property int $IdPegawai
 * @property int $IdNamaJabatan
 * @property int $KodeSatker
 * @property int $IdNamaJabatanUsulan
 * @property int $IdSatkerUsulan
 * @property string $Catatan
 * @property string $DokumenUsulanTPMPNPPJSDetil
 * @property string $Status
 * @property int $IdFitandProperTest
 *
 * @property TransUsulanTpmPnppjs $usulanTPMPNPPJS
 * @property TrefJabatan $namaJabatan
 * @property TmstSatker $satkerUsulan
 */
class TransUsulanTpmPnppjsDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_tpm_pnppjs_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanTPMPNPPJS', 'IdPegawai', 'IdNamaJabatan', 'IdSatkerUsulan'], 'required'],
            [['IdUsulanTPMPNPPJS', 'IdPegawai', 'IdNamaJabatan', 'KodeSatker', 'IdNamaJabatanUsulan', 'IdSatkerUsulan', 'IdFitandProperTest'], 'integer'],
            [['Catatan'], 'string', 'max' => 250],
            [['DokumenUsulanTPMPNPPJSDetil'], 'string', 'max' => 50],
            [['Status'], 'string', 'max' => 1],
            [['IdUsulanTPMPNPPJS'], 'exist', 'skipOnError' => true, 'targetClass' => TransUsulanTpmPnppjs::className(), 'targetAttribute' => ['IdUsulanTPMPNPPJS' => 'IdUsulanTPMPNPPJS']],
            [['IdNamaJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdNamaJabatan' => 'IdNamaJabatan']],
            [['IdSatkerUsulan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerUsulan' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanTPMPNPPJSDetil' => 'Id Usulan Tpmpnppjsdetil',
            'IdUsulanTPMPNPPJS' => 'Id Usulan Tpmpnppjs',
            'IdPegawai' => 'Id Pegawai',
            'IdNamaJabatan' => 'Id Nama Jabatan',
            'KodeSatker' => 'Kode Satker',
            'IdNamaJabatanUsulan' => 'Id Nama Jabatan Usulan',
            'IdSatkerUsulan' => 'Id Satker Usulan',
            'Catatan' => 'Catatan',
            'DokumenUsulanTPMPNPPJSDetil' => 'Dokumen Usulan Tpmpnppjsdetil',
            'Status' => 'Status',
            'IdFitandProperTest' => 'Id Fitand Proper Test',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsulanTPMPNPPJS()
    {
        return $this->hasOne(TransUsulanTpmPnppjs::className(), ['IdUsulanTPMPNPPJS' => 'IdUsulanTPMPNPPJS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerUsulan()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerUsulan']);
    }
}
