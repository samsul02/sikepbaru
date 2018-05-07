<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_organisasi".
 *
 * @property int $IdRiwayatOrganisasi
 * @property int $IdPegawai
 * @property int $IdStatusMasaOrganisasi
 * @property string $NamaOrganisasi
 * @property int $IdJabatanOrganisasi
 * @property string $LokasiOrganisasi
 * @property string $TahunMulai
 * @property string $TahunSelesai
 * @property string $NamaPimpinanOrganisasi
 * @property string $KeteranganOrganisasi
 * @property string $DokumenOrganisasi
 *
 * @property TmstPegawai $pegawai
 * @property TrefStatusMasaOrganisasi $statusMasaOrganisasi
 * @property TrefJabatan $jabatanOrganisasi
 */
class TransRiwayatOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_organisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai'], 'required'],
            [['IdPegawai', 'IdStatusMasaOrganisasi', 'IdJabatanOrganisasi'], 'integer'],
            [['TahunMulai', 'TahunSelesai'], 'safe'],
            [['NamaOrganisasi', 'KeteranganOrganisasi'], 'string', 'max' => 250],
            [['LokasiOrganisasi', 'NamaPimpinanOrganisasi'], 'string', 'max' => 100],
            [['DokumenOrganisasi'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdStatusMasaOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusMasaOrganisasi::className(), 'targetAttribute' => ['IdStatusMasaOrganisasi' => 'IDStatusMasaOrganisasi']],
            [['IdJabatanOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanOrganisasi' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatOrganisasi' => 'Id Riwayat Organisasi',
            'IdPegawai' => 'Id Pegawai',
            'IdStatusMasaOrganisasi' => 'Id Status Masa Organisasi',
            'NamaOrganisasi' => 'Nama Organisasi',
            'IdJabatanOrganisasi' => 'Id Jabatan Organisasi',
            'LokasiOrganisasi' => 'Lokasi Organisasi',
            'TahunMulai' => 'Tahun Mulai',
            'TahunSelesai' => 'Tahun Selesai',
            'NamaPimpinanOrganisasi' => 'Nama Pimpinan Organisasi',
            'KeteranganOrganisasi' => 'Keterangan Organisasi',
            'DokumenOrganisasi' => 'Dokumen Organisasi',
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
    public function getStatusMasaOrganisasi()
    {
        return $this->hasOne(TrefStatusMasaOrganisasi::className(), ['IDStatusMasaOrganisasi' => 'IdStatusMasaOrganisasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanOrganisasi()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanOrganisasi']);
    }
}
