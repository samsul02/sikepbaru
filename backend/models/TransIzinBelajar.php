<?php

namespace backend\modelscurrent;

use Yii;

/**
 * This is the model class for table "trans_izin_belajar".
 *
 * @property int $IdIzinBelajar
 * @property int $IdPegawai
 * @property string $Nama
 * @property int $IdSatker
 * @property int $IdGolonganRuang
 * @property string $PangkatGolongan
 * @property int $IdJabatanPegawai
 * @property int $IdUnitKerjaPegawai
 * @property string $TanggalSuratPermohonanIzin
 * @property string $AsalSurat
 * @property string $NomorSuratIzinBelajar
 * @property int $IdTingkatPendidikan
 * @property int $IdUniversitas
 * @property int $IdJurusan
 * @property string $TahunMulaiIzinBelajar
 * @property string $TahunSelesaiIzinBelajar
 *
 * @property TmstPegawai $pegawai
 * @property TmstUnitKerja $unitKerjaPegawai
 * @property TransRiwayatJabatan $satker
 * @property TrefJabatan $jabatanPegawai
 * @property TrefJurusan $jurusan
 * @property TrefTingkatPendidikan $tingkatPendidikan
 * @property TrefUniversitas $universitas
 * @property TrefGolonganRuang $golonganRuang
 */
class TransIzinBelajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_izin_belajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdGolonganRuang', 'PangkatGolongan', 'IdJabatanPegawai', 'IdUnitKerjaPegawai', 'TanggalSuratPermohonanIzin', 'AsalSurat', 'NomorSuratIzinBelajar', 'IdTingkatPendidikan', 'IdUniversitas', 'IdJurusan'], 'required'],
            [['IdPegawai', 'IdSatker', 'IdGolonganRuang', 'IdJabatanPegawai', 'IdUnitKerjaPegawai', 'IdTingkatPendidikan', 'IdUniversitas', 'IdJurusan'], 'integer'],
            [['TanggalSuratPermohonanIzin'], 'safe'],
            [['Nama', 'AsalSurat', 'NomorSuratIzinBelajar'], 'string', 'max' => 150],
            [['PangkatGolongan'], 'string', 'max' => 50],
            [['TahunMulaiIzinBelajar', 'TahunSelesaiIzinBelajar'], 'string', 'max' => 4],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdUnitKerjaPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaPegawai' => 'IdUnitKerja']],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TransRiwayatJabatan::className(), 'targetAttribute' => ['IdSatker' => 'IdRiwayatJabatanPegawai']],
            [['IdJabatanPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanPegawai' => 'IdNamaJabatan']],
            [['IdJurusan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJurusan::className(), 'targetAttribute' => ['IdJurusan' => 'IdJurusan']],
            [['IdTingkatPendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']],
            [['IdUniversitas'], 'exist', 'skipOnError' => true, 'targetClass' => TrefUniversitas::className(), 'targetAttribute' => ['IdUniversitas' => 'IdUniversitas']],
            [['IdGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganRuang' => 'IdGolonganRuang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdIzinBelajar' => 'Id Izin Belajar',
            'IdPegawai' => 'Id Pegawai',
            'Nama' => 'Nama',
            'IdSatker' => 'Id Satker',
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'PangkatGolongan' => 'Pangkat Golongan',
            'IdJabatanPegawai' => 'Id Jabatan Pegawai',
            'IdUnitKerjaPegawai' => 'Id Unit Kerja Pegawai',
            'TanggalSuratPermohonanIzin' => 'Tanggal Surat Permohonan Izin',
            'AsalSurat' => 'Asal Surat',
            'NomorSuratIzinBelajar' => 'Nomor Surat Izin Belajar',
            'IdTingkatPendidikan' => 'Id Tingkat Pendidikan',
            'IdUniversitas' => 'Id Universitas',
            'IdJurusan' => 'Id Jurusan',
            'TahunMulaiIzinBelajar' => 'Tahun Mulai Izin Belajar',
            'TahunSelesaiIzinBelajar' => 'Tahun Selesai Izin Belajar',
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
    public function getUnitKerjaPegawai()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TransRiwayatJabatan::className(), ['IdRiwayatJabatanPegawai' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanPegawai()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(TrefJurusan::className(), ['IdJurusan' => 'IdJurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkatPendidikan()
    {
        return $this->hasOne(TrefTingkatPendidikan::className(), ['IdRefTingkatPendidikan' => 'IdTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversitas()
    {
        return $this->hasOne(TrefUniversitas::className(), ['IdUniversitas' => 'IdUniversitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolonganRuang()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }
}
