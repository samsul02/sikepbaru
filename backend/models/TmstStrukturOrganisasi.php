<?php

namespace backend\modelscurrent;

use Yii;

/**
 * This is the model class for table "tmst_struktur_organisasi".
 *
 * @property int $IdRefStrukturOrgansasi
 * @property int $IdParentStrukturOrganisasi
 * @property int $LevelStrukturOrganisasi
 * @property int $LokasiStrukturOrganisasi
 * @property int $KodeJenisSatkerStrukturOrganisasi
 * @property int $IdKelasStrukturOrganisasi
 * @property string $KodeJabatanOld
 * @property int $IdNamaJabatan
 * @property int $IdUnitKerja
 * @property int $IdTugasPokok
 * @property int $IdGajiTunjangan
 *
 * @property TmstListJabatanOrganisasi[] $tmstListJabatanOrganisasi
 * @property TmstUnitKerja $unitKerja
 * @property TrefJabatan $namaJabatan
 * @property TrefJenisSatker $kodeJenisSatkerStrukturOrganisasi
 * @property TrefLokasi $lokasiStrukturOrganisasi
 * @property TransRiwayatJabatan[] $transRiwayatJabatan
 */
class TmstStrukturOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_struktur_organisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdParentStrukturOrganisasi', 'LevelStrukturOrganisasi', 'LokasiStrukturOrganisasi', 'KodeJenisSatkerStrukturOrganisasi', 'IdKelasStrukturOrganisasi', 'IdNamaJabatan', 'IdUnitKerja', 'IdTugasPokok', 'IdGajiTunjangan'], 'integer'],
            [['IdNamaJabatan', 'IdUnitKerja', 'IdGajiTunjangan'], 'required'],
            [['KodeJabatanOld'], 'string', 'max' => 4],
            [['IdUnitKerja'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerja' => 'IdUnitKerja']],
            [['IdNamaJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdNamaJabatan' => 'IdNamaJabatan']],
            [['KodeJenisSatkerStrukturOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisSatker::className(), 'targetAttribute' => ['KodeJenisSatkerStrukturOrganisasi' => 'IdJenisSatker']],
            [['LokasiStrukturOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefLokasi::className(), 'targetAttribute' => ['LokasiStrukturOrganisasi' => 'IdLokasi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefStrukturOrgansasi' => 'Id Ref Struktur Organsasi',
            'IdParentStrukturOrganisasi' => 'Id Parent Struktur Organisasi',
            'LevelStrukturOrganisasi' => 'Level Struktur Organisasi',
            'LokasiStrukturOrganisasi' => 'Lokasi Struktur Organisasi',
            'KodeJenisSatkerStrukturOrganisasi' => 'Kode Jenis Satker Struktur Organisasi',
            'IdKelasStrukturOrganisasi' => 'Id Kelas Struktur Organisasi',
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
        return $this->hasMany(TmstListJabatanOrganisasi::className(), ['IdStrukturOrganisasi' => 'IdRefStrukturOrgansasi']);
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
    public function getKodeJenisSatkerStrukturOrganisasi()
    {
        return $this->hasOne(TrefJenisSatker::className(), ['IdJenisSatker' => 'KodeJenisSatkerStrukturOrganisasi']);
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
    public function getTransRiwayatJabatan()
    {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdStrukturOrganisasi' => 'IdRefStrukturOrgansasi']);
    }
}
