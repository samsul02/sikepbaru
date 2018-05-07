<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_diklat_perjenjangan".
 *
 * @property int $IdRiwayatDiklatPerjenjangan
 * @property int $IdPegawai
 * @property int $IdDiklatPerjenjangan
 * @property int $AngkatanRiwayatDiklatPerjenjangan
 * @property string $TahunRiwayatDiklatPerjenjangan
 * @property int $LamaDiklatPerjenjangan
 * @property string $PenyelenggaraDiklatPerjenjangan
 * @property int $PeringkatDiklatPerjenjangan
 * @property int $IdKualifikasiKelulusan
 * @property string $NomorSertifikatDiklatPerjenjangan
 * @property string $TanggalSertifikatDiklatPerjenjangan
 * @property string $PejabatSertifikatDiklatPerjenjangan
 * @property string $DokumenSertifikatDiklatPerjenjangan
 *
 * @property TmstPegawai $pegawai
 * @property TrefDiklatPerjenjangan $diklatPerjenjangan
 * @property TrefDiklatKualifikasiKelulusan $kualifikasiKelulusan
 */
class TransRiwayatDiklatPerjenjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_diklat_perjenjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai'], 'required'],
            [['IdPegawai', 'IdDiklatPerjenjangan', 'AngkatanRiwayatDiklatPerjenjangan', 'LamaDiklatPerjenjangan', 'PeringkatDiklatPerjenjangan', 'IdKualifikasiKelulusan'], 'integer'],
            [['TahunRiwayatDiklatPerjenjangan', 'TanggalSertifikatDiklatPerjenjangan'], 'safe'],
            [['PenyelenggaraDiklatPerjenjangan'], 'string', 'max' => 200],
            [['NomorSertifikatDiklatPerjenjangan', 'PejabatSertifikatDiklatPerjenjangan', 'DokumenSertifikatDiklatPerjenjangan'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdDiklatPerjenjangan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefDiklatPerjenjangan::className(), 'targetAttribute' => ['IdDiklatPerjenjangan' => 'IdDiklatPerjenjangan']],
            [['IdKualifikasiKelulusan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefDiklatKualifikasiKelulusan::className(), 'targetAttribute' => ['IdKualifikasiKelulusan' => 'IdDiklatKualifikasiLulusan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatDiklatPerjenjangan' => 'Id Riwayat Diklat Perjenjangan',
            'IdPegawai' => 'Id Pegawai',
            'IdDiklatPerjenjangan' => 'Id Diklat Perjenjangan',
            'AngkatanRiwayatDiklatPerjenjangan' => 'Angkatan Riwayat Diklat Perjenjangan',
            'TahunRiwayatDiklatPerjenjangan' => 'Tahun Riwayat Diklat Perjenjangan',
            'LamaDiklatPerjenjangan' => 'Lama Diklat Perjenjangan',
            'PenyelenggaraDiklatPerjenjangan' => 'Penyelenggara Diklat Perjenjangan',
            'PeringkatDiklatPerjenjangan' => 'Peringkat Diklat Perjenjangan',
            'IdKualifikasiKelulusan' => 'Id Kualifikasi Kelulusan',
            'NomorSertifikatDiklatPerjenjangan' => 'Nomor Sertifikat Diklat Perjenjangan',
            'TanggalSertifikatDiklatPerjenjangan' => 'Tanggal Sertifikat Diklat Perjenjangan',
            'PejabatSertifikatDiklatPerjenjangan' => 'Pejabat Sertifikat Diklat Perjenjangan',
            'DokumenSertifikatDiklatPerjenjangan' => 'Dokumen Sertifikat Diklat Perjenjangan',
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
    public function getDiklatPerjenjangan()
    {
        return $this->hasOne(TrefDiklatPerjenjangan::className(), ['IdDiklatPerjenjangan' => 'IdDiklatPerjenjangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKualifikasiKelulusan()
    {
        return $this->hasOne(TrefDiklatKualifikasiKelulusan::className(), ['IdDiklatKualifikasiLulusan' => 'IdKualifikasiKelulusan']);
    }
}
