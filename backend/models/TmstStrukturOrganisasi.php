<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_struktur_organisasi".
 *
 * @property int $IdRefStrukturOrganisasi
 * @property int $IdParentStrukturOrganisasi
 * @property string $KodeStrukturOrganisasi
 * @property int $LevelStrukturOrganisasi
 * @property int $LokasiStrukturOrganisasi
 * @property int $IdSatker
 * @property string $KodeJabatanOld
 * @property int $IdNamaJabatan
 * @property int $IdUnitKerja
 * @property int $IdTugasPokok
 * @property int $IdGajiTunjangan
 *
 * @property TmstListJabatanOrganisasi[] $tmstListJabatanOrganisasi
 * @property TmstUnitKerja $unitKerja
 * @property TrefJabatan $namaJabatan
 * @property TrefLokasi $lokasiStrukturOrganisasi
 * @property TmstSatker $satker
 * @property TransRiwayatJabatan[] $transRiwayatJabatan
 */
class TmstStrukturOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmst_struktur_organisasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdParentStrukturOrganisasi', 'LevelStrukturOrganisasi', 'LokasiStrukturOrganisasi', 'IdSatker', 'IdNamaJabatan', 'IdUnitKerja', 'IdTugasPokok', 'IdGajiTunjangan'], 'integer'],
            [['KodeStrukturOrganisasi', 'IdNamaJabatan', 'IdUnitKerja', 'IdGajiTunjangan'], 'required'],
            [['KodeStrukturOrganisasi'], 'string', 'max' => 15],
            [['KodeJabatanOld'], 'string', 'max' => 4],
            [['IdUnitKerja'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerja' => 'IdUnitKerja']],
            [['IdNamaJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdNamaJabatan' => 'IdNamaJabatan']],
            [['LokasiStrukturOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefLokasi::className(), 'targetAttribute' => ['LokasiStrukturOrganisasi' => 'IdLokasi']],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdRefStrukturOrganisasi' => 'Id Ref Struktur Organisasi',
            'IdParentStrukturOrganisasi' => 'Id Parent Struktur Organisasi',
            'KodeStrukturOrganisasi' => 'Kode Struktur Organisasi',
            'LevelStrukturOrganisasi' => 'Level Struktur Organisasi',
            'LokasiStrukturOrganisasi' => 'Lokasi Struktur Organisasi',
            'IdSatker' => 'Id Satker',
            'KodeJabatanOld' => 'Kode Jabatan Old',
            'IdNamaJabatan' => 'Id Nama Jabatan',
            'IdUnitKerja' => 'Id Unit Kerja',
            'IdTugasPokok' => 'Id Tugas Pokok',
            'IdGajiTunjangan' => 'Id Gaji Tunjangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstListJabatanOrganisasi()
    {
        return $this->hasMany(TmstListJabatanOrganisasi::className(), ['IdStrukturOrganisasi' => 'IdRefStrukturOrganisasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerja()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerja']);
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
    public function getLokasiStrukturOrganisasi()
    {
        return $this->hasOne(TrefLokasi::className(), ['IdLokasi' => 'LokasiStrukturOrganisasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatJabatan()
    {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdStrukturOrganisasi' => 'IdRefStrukturOrganisasi']);
    }
}
