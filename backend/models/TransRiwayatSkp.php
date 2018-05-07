<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_skp".
 *
 * @property int $IdRiwayatSKP
 * @property int $IdPegawai
 * @property int $IdRiwayatJabatanPegawai
 * @property string $TahunSKP
 * @property int $IdPegawaiPejabatPenilai
 * @property int $IdRiwayatJabatanPejabatPenilai
 * @property int $IdPegawaiAtasanPejabatPenilai
 * @property int $IdRiwayatjabatanAtasanPejabatPenilai
 * @property string $KeberatanPegawaiDinilai
 * @property string $TanggapanPejabatPenilaiAtas
 * @property string $KeputusanAtasanJabatan
 * @property string $Rekomendasi
 * @property int $NilaiSKP
 * @property string $DokumenNilaiSKP
 *
 * @property TransPerilakuKerja[] $transPerilakuKerja
 * @property TmstPegawai $pegawai
 * @property TmstPegawai $pegawaiPejabatPenilai
 * @property TmstPegawai $pegawaiAtasanPejabatPenilai
 * @property TransRiwayatJabatan $riwayatJabatanPegawai
 * @property TransRiwayatJabatan $riwayatJabatanPejabatPenilai
 * @property TransRiwayatJabatan $riwayatjabatanAtasanPejabatPenilai
 */
class TransRiwayatSkp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_skp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TahunSKP', 'IdPegawaiPejabatPenilai', 'IdPegawaiAtasanPejabatPenilai', 'NilaiSKP', 'DokumenNilaiSKP'], 'required'],
            [['IdPegawai', 'IdRiwayatJabatanPegawai', 'IdPegawaiPejabatPenilai', 'IdRiwayatJabatanPejabatPenilai', 'IdPegawaiAtasanPejabatPenilai', 'IdRiwayatjabatanAtasanPejabatPenilai', 'NilaiSKP'], 'integer'],
            [['TahunSKP'], 'safe'],
            [['KeberatanPegawaiDinilai', 'TanggapanPejabatPenilaiAtas', 'KeputusanAtasanJabatan', 'Rekomendasi'], 'string', 'max' => 100],
            [['DokumenNilaiSKP'], 'string', 'max' => 200],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdPegawaiPejabatPenilai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiPejabatPenilai' => 'IdPegawai']],
            [['IdPegawaiAtasanPejabatPenilai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiAtasanPejabatPenilai' => 'IdPegawai']],
            [['IdRiwayatJabatanPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TransRiwayatJabatan::className(), 'targetAttribute' => ['IdRiwayatJabatanPegawai' => 'IdRiwayatJabatanPegawai']],
            [['IdRiwayatJabatanPejabatPenilai'], 'exist', 'skipOnError' => true, 'targetClass' => TransRiwayatJabatan::className(), 'targetAttribute' => ['IdRiwayatJabatanPejabatPenilai' => 'IdRiwayatJabatanPegawai']],
            [['IdRiwayatjabatanAtasanPejabatPenilai'], 'exist', 'skipOnError' => true, 'targetClass' => TransRiwayatJabatan::className(), 'targetAttribute' => ['IdRiwayatjabatanAtasanPejabatPenilai' => 'IdRiwayatJabatanPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatSKP' => 'Id Riwayat Skp',
            'IdPegawai' => 'Id Pegawai',
            'IdRiwayatJabatanPegawai' => 'Id Riwayat Jabatan Pegawai',
            'TahunSKP' => 'Tahun Skp',
            'IdPegawaiPejabatPenilai' => 'Id Pegawai Pejabat Penilai',
            'IdRiwayatJabatanPejabatPenilai' => 'Id Riwayat Jabatan Pejabat Penilai',
            'IdPegawaiAtasanPejabatPenilai' => 'Id Pegawai Atasan Pejabat Penilai',
            'IdRiwayatjabatanAtasanPejabatPenilai' => 'Id Riwayatjabatan Atasan Pejabat Penilai',
            'KeberatanPegawaiDinilai' => 'Keberatan Pegawai Dinilai',
            'TanggapanPejabatPenilaiAtas' => 'Tanggapan Pejabat Penilai Atas',
            'KeputusanAtasanJabatan' => 'Keputusan Atasan Jabatan',
            'Rekomendasi' => 'Rekomendasi',
            'NilaiSKP' => 'Nilai Skp',
            'DokumenNilaiSKP' => 'Dokumen Nilai Skp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPerilakuKerja()
    {
        return $this->hasMany(TransPerilakuKerja::className(), ['IdRiwayatSKP' => 'IdRiwayatSKP']);
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
    public function getPegawaiPejabatPenilai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiPejabatPenilai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawaiAtasanPejabatPenilai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiAtasanPejabatPenilai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatJabatanPegawai()
    {
        return $this->hasOne(TransRiwayatJabatan::className(), ['IdRiwayatJabatanPegawai' => 'IdRiwayatJabatanPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatJabatanPejabatPenilai()
    {
        return $this->hasOne(TransRiwayatJabatan::className(), ['IdRiwayatJabatanPegawai' => 'IdRiwayatJabatanPejabatPenilai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatjabatanAtasanPejabatPenilai()
    {
        return $this->hasOne(TransRiwayatJabatan::className(), ['IdRiwayatJabatanPegawai' => 'IdRiwayatjabatanAtasanPejabatPenilai']);
    }
}
