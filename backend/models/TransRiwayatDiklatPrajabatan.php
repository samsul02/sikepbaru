<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_diklat_prajabatan".
 *
 * @property int $IdRiwayatDiklatPrajabatan
 * @property int $IdPegawai
 * @property int $IdNamaDiklatPrajabatan
 * @property int $IdNegara
 * @property string $NamaDiklatPrajabatan
 * @property int $LamaDiklatPrajabatan
 * @property string $TanggalMulaiDiklatPrajabatan
 * @property string $TanggalAkhirDiklatPrajabatan
 * @property string $PenyelenggaraDiklatPrajabatan
 * @property string $NomorSertifikatDiklatPrajabatan
 * @property string $TanggalSertifikatDiklatPrajabatan
 * @property string $PejabatSertifikatDiklatPrajabatan
 * @property string $DokumenSertifikatDiklatPrajabatan
 *
 * @property TmstPegawai $pegawai
 * @property TrefNegara $negara
 */
class TransRiwayatDiklatPrajabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_diklat_prajabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdNamaDiklatPrajabatan', 'IdNegara', 'NamaDiklatPrajabatan'], 'required'],
            [['IdPegawai', 'IdNamaDiklatPrajabatan', 'IdNegara', 'LamaDiklatPrajabatan'], 'integer'],
            [['TanggalMulaiDiklatPrajabatan', 'TanggalAkhirDiklatPrajabatan', 'TanggalSertifikatDiklatPrajabatan'], 'safe'],
            [['NamaDiklatPrajabatan'], 'string', 'max' => 150],
            [['PenyelenggaraDiklatPrajabatan'], 'string', 'max' => 200],
            [['NomorSertifikatDiklatPrajabatan', 'PejabatSertifikatDiklatPrajabatan', 'DokumenSertifikatDiklatPrajabatan'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatDiklatPrajabatan' => 'Id Riwayat Diklat Prajabatan',
            'IdPegawai' => 'Id Pegawai',
            'IdNamaDiklatPrajabatan' => 'Id Nama Diklat Prajabatan',
            'IdNegara' => 'Id Negara',
            'NamaDiklatPrajabatan' => 'Nama Diklat Prajabatan',
            'LamaDiklatPrajabatan' => 'Lama Diklat Prajabatan',
            'TanggalMulaiDiklatPrajabatan' => 'Tanggal Mulai Diklat Prajabatan',
            'TanggalAkhirDiklatPrajabatan' => 'Tanggal Akhir Diklat Prajabatan',
            'PenyelenggaraDiklatPrajabatan' => 'Penyelenggara Diklat Prajabatan',
            'NomorSertifikatDiklatPrajabatan' => 'Nomor Sertifikat Diklat Prajabatan',
            'TanggalSertifikatDiklatPrajabatan' => 'Tanggal Sertifikat Diklat Prajabatan',
            'PejabatSertifikatDiklatPrajabatan' => 'Pejabat Sertifikat Diklat Prajabatan',
            'DokumenSertifikatDiklatPrajabatan' => 'Dokumen Sertifikat Diklat Prajabatan',
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
    public function getNegara()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'IdNegara']);
    }
}
