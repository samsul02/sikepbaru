<?php

namespace backend\modelscurrent;

use Yii;

/**
 * This is the model class for table "trans_riwayat_jabatan".
 *
 * @property int $IdRiwayatJabatanPegawai
 * @property int $IdPegawai
 * @property int $IdPegawaiAtasan
 * @property int $IdSatker
 * @property string $TMTJabatanMulai
 * @property string $TMTJabatanSelesai
 * @property int $IdNamaJabatan
 * @property int $IdStrukturOrganisasi
 * @property string $TMTEselon
 * @property int $AngkaKredit
 * @property string $NomorSK
 * @property string $TanggalSK
 * @property string $PejabatSK
 * @property int $IdKPPN
 * @property string $LokasiTASPEN
 * @property string $DokumenSK
 * @property string $TanggalPelantikan
 * @property string $NomorSPP
 * @property string $TanggalSPP
 * @property string $PejabatSPP
 * @property string $DokumenSPP
 * @property string $TMTSPMT
 * @property string $NomorSPMT
 * @property string $TanggalSPMT
 * @property string $PejabatSPMT
 * @property string $DokumenSPMT
 * @property string $LembagaPenerbitSKFungsional
 * @property string $FlagDiperbantukandiMA
 * @property string $FlagDiperbantukandiLuar
 * @property string $FlagAssignment
 * @property string $FlagAktif1
 * @property string $FlagAktif2
 *
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TmstPegawai $pegawai
 * @property TmstPegawai $pegawaiAtasan
 * @property TmstSatker $satker
 * @property TrefJabatan $namaJabatan
 * @property TrefKppn $kPPN
 * @property TmstStrukturOrganisasi $strukturOrganisasi
 * @property TransRiwayatSkp[] $transRiwayatSkp
 * @property TransRiwayatSkp[] $transRiwayatSkp0
 * @property TransRiwayatSkp[] $transRiwayatSkp1
 */
class TransRiwayatJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdSatker', 'TMTJabatanMulai', 'IdNamaJabatan', 'TMTEselon', 'NomorSK', 'LokasiTASPEN'], 'required'],
            [['IdPegawai', 'IdPegawaiAtasan', 'IdSatker', 'IdNamaJabatan', 'IdStrukturOrganisasi', 'AngkaKredit', 'IdKPPN'], 'integer'],
            [['TMTJabatanMulai', 'TMTJabatanSelesai', 'TMTEselon', 'TanggalSK', 'TanggalPelantikan', 'TanggalSPP', 'TMTSPMT', 'TanggalSPMT'], 'safe'],
            [['FlagDiperbantukandiMA', 'FlagDiperbantukandiLuar', 'FlagAssignment', 'FlagAktif1', 'FlagAktif2'], 'string'],
            [['NomorSK', 'PejabatSK', 'LokasiTASPEN', 'DokumenSK', 'NomorSPP', 'PejabatSPP', 'DokumenSPP', 'NomorSPMT', 'PejabatSPMT', 'DokumenSPMT', 'LembagaPenerbitSKFungsional'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdPegawaiAtasan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiAtasan' => 'IdPegawai']],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
            [['IdNamaJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdNamaJabatan' => 'IdNamaJabatan']],
            [['IdKPPN'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKppn::className(), 'targetAttribute' => ['IdKPPN' => 'IdKPPN']],
            [['IdStrukturOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TmstStrukturOrganisasi::className(), 'targetAttribute' => ['IdStrukturOrganisasi' => 'IdRefStrukturOrgansasi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatJabatanPegawai' => 'Id Riwayat Jabatan Pegawai',
            'IdPegawai' => 'Id Pegawai',
            'IdPegawaiAtasan' => 'Id Pegawai Atasan',
            'IdSatker' => 'Id Satker',
            'TMTJabatanMulai' => 'Tmtjabatan Mulai',
            'TMTJabatanSelesai' => 'Tmtjabatan Selesai',
            'IdNamaJabatan' => 'Id Nama Jabatan',
            'IdStrukturOrganisasi' => 'Id Struktur Organisasi',
            'TMTEselon' => 'Tmteselon',
            'AngkaKredit' => 'Angka Kredit',
            'NomorSK' => 'Nomor Sk',
            'TanggalSK' => 'Tanggal Sk',
            'PejabatSK' => 'Pejabat Sk',
            'IdKPPN' => 'Id Kppn',
            'LokasiTASPEN' => 'Lokasi Taspen',
            'DokumenSK' => 'Dokumen Sk',
            'TanggalPelantikan' => 'Tanggal Pelantikan',
            'NomorSPP' => 'Nomor Spp',
            'TanggalSPP' => 'Tanggal Spp',
            'PejabatSPP' => 'Pejabat Spp',
            'DokumenSPP' => 'Dokumen Spp',
            'TMTSPMT' => 'Tmtspmt',
            'NomorSPMT' => 'Nomor Spmt',
            'TanggalSPMT' => 'Tanggal Spmt',
            'PejabatSPMT' => 'Pejabat Spmt',
            'DokumenSPMT' => 'Dokumen Spmt',
            'LembagaPenerbitSKFungsional' => 'Lembaga Penerbit Skfungsional',
            'FlagDiperbantukandiMA' => 'Flag Diperbantukandi Ma',
            'FlagDiperbantukandiLuar' => 'Flag Diperbantukandi Luar',
            'FlagAssignment' => 'Flag Assignment',
            'FlagAktif1' => 'Flag Aktif1',
            'FlagAktif2' => 'Flag Aktif2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdSatker' => 'IdRiwayatJabatanPegawai']);
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
    public function getPegawaiAtasan()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiAtasan']);
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
    public function getNamaJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKPPN()
    {
        return $this->hasOne(TrefKppn::className(), ['IdKPPN' => 'IdKPPN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrukturOrganisasi()
    {
        return $this->hasOne(TmstStrukturOrganisasi::className(), ['IdRefStrukturOrgansasi' => 'IdStrukturOrganisasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSkp()
    {
        return $this->hasMany(TransRiwayatSkp::className(), ['IdRiwayatJabatanPegawai' => 'IdRiwayatJabatanPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSkp0()
    {
        return $this->hasMany(TransRiwayatSkp::className(), ['IdRiwayatJabatanPejabatPenilai' => 'IdRiwayatJabatanPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSkp1()
    {
        return $this->hasMany(TransRiwayatSkp::className(), ['IdRiwayatjabatanAtasanPejabatPenilai' => 'IdRiwayatJabatanPegawai']);
    }
}
