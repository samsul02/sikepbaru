<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_mutasi_pegawai".
 *
 * @property int $IdRiwayatMutasiPegawai
 * @property int $IdPegawai
 * @property int $IdSatkerAsal
 * @property int $IdSatkerTujuan
 * @property string $TanggalEfektifMutasi
 * @property int $IdUnitKerjaAsal
 * @property int $IdUnitKerjaTujuan
 * @property int $IdJabatanAsal
 * @property int $IdJabatanTujuan
 * @property int $DokumenSK
 * @property int $BiayaMutasi
 *
 * @property TmstPegawai $pegawai
 * @property TmstSatker $satkerAsal
 * @property TmstSatker $satkerTujuan
 * @property TmstUnitKerja $unitKerjaAsal
 * @property TmstUnitKerja $unitKerjaTujuan
 * @property TrefJabatan $jabatanAsal
 * @property TrefJabatan $jabatanTujuan
 */
class TransRiwayatMutasiPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_mutasi_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdSatkerAsal', 'IdSatkerTujuan', 'TanggalEfektifMutasi', 'IdUnitKerjaAsal', 'IdUnitKerjaTujuan', 'IdJabatanAsal', 'IdJabatanTujuan', 'BiayaMutasi'], 'required'],
            [['IdPegawai', 'IdSatkerAsal', 'IdSatkerTujuan', 'IdUnitKerjaAsal', 'IdUnitKerjaTujuan', 'IdJabatanAsal', 'IdJabatanTujuan', 'DokumenSK', 'BiayaMutasi'], 'integer'],
            [['TanggalEfektifMutasi'], 'safe'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdSatkerAsal'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerAsal' => 'IdSatker']],
            [['IdSatkerTujuan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerTujuan' => 'IdSatker']],
            [['IdUnitKerjaAsal'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaAsal' => 'IdUnitKerja']],
            [['IdUnitKerjaTujuan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaTujuan' => 'IdUnitKerja']],
            [['IdJabatanAsal'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanAsal' => 'IdNamaJabatan']],
            [['IdJabatanTujuan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanTujuan' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatMutasiPegawai' => 'Id Riwayat Mutasi Pegawai',
            'IdPegawai' => 'Id Pegawai',
            'IdSatkerAsal' => 'Id Satker Asal',
            'IdSatkerTujuan' => 'Id Satker Tujuan',
            'TanggalEfektifMutasi' => 'Tanggal Efektif Mutasi',
            'IdUnitKerjaAsal' => 'Id Unit Kerja Asal',
            'IdUnitKerjaTujuan' => 'Id Unit Kerja Tujuan',
            'IdJabatanAsal' => 'Id Jabatan Asal',
            'IdJabatanTujuan' => 'Id Jabatan Tujuan',
            'DokumenSK' => 'Dokumen Sk',
            'BiayaMutasi' => 'Biaya Mutasi',
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
    public function getSatkerAsal()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerAsal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerTujuan()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerTujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerjaAsal()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaAsal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerjaTujuan()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaTujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanAsal()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanAsal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanTujuan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanTujuan']);
    }
}
