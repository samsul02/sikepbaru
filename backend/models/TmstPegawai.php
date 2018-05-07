<?php

namespace backend\models;

/*
 * note:
 * 
 * berdasarkan kamus data SIKEP, 
 * fields yang diupdate otomatis menggunakan trigger:
 * - KodeGolonganRuang (hal.12)
 * KodeGolonganRuang diupdate otomatis menggunakan trigger saat ada data di riwayatpangkat).
 * Khusus untuk Hakim Agung non-karier, Hakim Adhoc dan Honorer,
 * maka tidak akan punya riwayat golongan, sehingga dipilih 'TANPA GOLONGAN' DARI TREF_GOLONGANRUANG
 * 
 * - IdJabatan (hal.14)
 * IdJabatan diisi dengan trigger dan SP saat ada isian baru di riwayat jabatan
 * 
 * 
 * 
 */

/**
 * This is the model class for table "tmst_pegawai".
 *
 * @property int $IdPegawai
 * @property string $NIPLama
 * @property string $NIPBaru
 * @property string $NIK
 * @property string $NamaLengkap
 * @property string $GelarDepan
 * @property string $GelarBelakang
 * @property int $KodeGolonganRuang
 * @property int $StatusPerkawinan
 * @property int $JenisPegawai
 * @property int $StatusPegawai
 * @property int $Agama
 * @property string $EmailPegawai
 * @property string $NomorHandphone
 * @property string $NomorTelepon
 * @property string $TanggalLahir
 * @property int $KabupatenTempatLahir
 * @property int $PropinsiTempatLahir
 * @property string $JenisKelamin
 * @property int $GolonganDarah
 * @property int $TinggiBadan
 * @property int $BeratBadan
 * @property int $Rambut
 * @property int $WarnaKulit
 * @property int $BentukMuka
 * @property string $CiriKhusus
 * @property string $CacatTubuh
 * @property int $IdSukuBangsa
 * @property string $DokumenAktaLahir
 * @property string $KegemaranHobi
 * @property int $IdJabatan
 * @property string $MasaKerja
 * @property string $FotoPegawai
 * @property int $KodeBankPegawai
 * @property string $NomorRekeningPegawai
 * @property string $CabangRekeningPegawai
 * @property string $NamaRekeningPegawai
 * @property string $FingerprintPegawai
 *
 * @property TmstAlamatPegawai[] $tmstAlamatPegawai
 * @property TmstKartuPegawai[] $tmstKartuPegawai
 * @property TmstKeluarga[] $tmstKeluarga
 * @property TrefGolonganRuang $kodeGolonganRuang
 * @property TrefWarnaKulit $warnaKulit
 * @property TrefBentukMuka $bentukMuka
 * @property TrefSukubangsa $sukuBangsa
 * @property TrefJabatan $jabatan
 * @property TrefBank $kodeBankPegawai
 * @property TrefStatusPerkawinan $statusPerkawinan
 * @property TrefJenisPegawai $jenisPegawai
 * @property TrefStatusPegawai $statusPegawai
 * @property TrefAgama $agama
 * @property TrefKabupaten $kabupatenTempatLahir
 * @property TrefPropinsi $propinsiTempatLahir
 * @property TrefGolonganDarah $golonganDarah
 * @property TrefRambut $rambut
 * @property TmstUser[] $tmstUser
 * @property TransAbsensi[] $transAbsensi
 * @property TransAngkaKredit[] $transAngkaKredit
 * @property TransAssesmentIndividu[] $transAssesmentIndividu
 * @property TransFitAndProperTes[] $transFitAndProperTes
 * @property TransForumDetail[] $transForumDetail
 * @property TransInsentif[] $transInsentif
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransPegawaiJabatanTambahan[] $transPegawaiJabatanTambahan
 * @property TransPenguasaanBahasa[] $transPenguasaanBahasa
 * @property TransPeninjauanMasaKerja[] $transPeninjauanMasaKerja
 * @property TransPensiun[] $transPensiun
 * @property TransPesan[] $transPesan
 * @property TransPesan[] $transPesan0
 * @property TransProfesiKeahlian[] $transProfesiKeahlian
 * @property TransRiwayatBuktiPotongPajak[] $transRiwayatBuktiPotongPajak
 * @property TransRiwayatCuti[] $transRiwayatCuti
 * @property TransRiwayatCuti[] $transRiwayatCuti0
 * @property TransRiwayatDiklatFungsional[] $transRiwayatDiklatFungsional
 * @property TransRiwayatDiklatPerjenjangan[] $transRiwayatDiklatPerjenjangan
 * @property TransRiwayatDiklatPrajabatan[] $transRiwayatDiklatPrajabatan
 * @property TransRiwayatDiklatTeknis[] $transRiwayatDiklatTeknis
 * @property TransRiwayatDp3[] $transRiwayatDp3
 * @property TransRiwayatDp3[] $transRiwayatDp30
 * @property TransRiwayatDp3[] $transRiwayatDp31
 * @property TransRiwayatInpassing[] $transRiwayatInpassing
 * @property TransRiwayatInpassing[] $transRiwayatInpassing0
 * @property TransRiwayatJabatan[] $transRiwayatJabatan
 * @property TransRiwayatJabatan[] $transRiwayatJabatan0
 * @property TransRiwayatKeanggotaanParpol[] $transRiwayatKeanggotaanParpol
 * @property TransRiwayatKesehatan[] $transRiwayatKesehatan
 * @property TransRiwayatKgb[] $transRiwayatKgb
 * @property TransRiwayatKursus[] $transRiwayatKursus
 * @property TransRiwayatLhkpn[] $transRiwayatLhkpn
 * @property TransRiwayatLuarNegeri[] $transRiwayatLuarNegeri
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai
 * @property TransRiwayatOrganisasi[] $transRiwayatOrganisasi
 * @property TransRiwayatPangkat[] $transRiwayatPangkat
 * @property TransRiwayatPendidikan[] $transRiwayatPendidikan
 * @property TransRiwayatPenghargaan[] $transRiwayatPenghargaan
 * @property TransRiwayatPenugasanOperasiMiliter[] $transRiwayatPenugasanOperasiMiliter
 * @property TransRiwayatPrestasi[] $transRiwayatPrestasi
 * @property TransRiwayatSanksi[] $transRiwayatSanksi
 * @property TransRiwayatSeminar[] $transRiwayatSeminar
 * @property TransRiwayatSkp[] $transRiwayatSkp
 * @property TransRiwayatSkp[] $transRiwayatSkp0
 * @property TransRiwayatSkp[] $transRiwayatSkp1
 * @property TransRiwayatTugasBelajar[] $transRiwayatTugasBelajar
 * @property TransRiwayatUjianDinas[] $transRiwayatUjianDinas
 * @property TransUsulanKenaikanPangkat[] $transUsulanKenaikanPangkat
 * @property TransUsulanKgbDetail[] $transUsulanKgbDetail
 * @property TransUsulanKgbDetail[] $transUsulanKgbDetail0
 * @property TransUsulanKpDetail[] $transUsulanKpDetail
 * @property TransUsulanKpoDetail[] $transUsulanKpoDetail
 * @property TransUsulanPakJabatanFungsional[] $transUsulanPakJabatanFungsional
 * @property TransUsulanPemberianSatyaLencana[] $transUsulanPemberianSatyaLencana
 * @property TransUsulanPensiun[] $transUsulanPensiun
 * @property TransUsulanPensiunDetail[] $transUsulanPensiunDetail
 * @property TransUsulanPensiunDetail[] $transUsulanPensiunDetail0
 * @property TransUsulanPromosiMutasi[] $transUsulanPromosiMutasi
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail
 * @property TransUsulanTpmHakimDetail[] $transUsulanTpmHakimDetail
 */
class TmstPegawai extends \yii\db\ActiveRecord {

    public $fileFotoPegawai;
    public $fileAktaPegawai;
    public $intIdPropinsi;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tmst_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['NIK', 'NamaLengkap', 'KodeGolonganRuang', 'StatusPerkawinan', 'JenisPegawai', 'StatusPegawai', 'TanggalLahir', 'KabupatenTempatLahir', 'PropinsiTempatLahir', 'MasaKerja'], 'required'],
            [['KodeGolonganRuang', 'StatusPerkawinan', 'JenisPegawai', 'StatusPegawai', 'Agama', 'KabupatenTempatLahir', 'PropinsiTempatLahir', 'GolonganDarah', 'TinggiBadan', 'BeratBadan', 'Rambut', 'WarnaKulit', 'BentukMuka', 'IdSukuBangsa', 'IdJabatan', 'KodeBankPegawai'], 'integer'],
            [['intIdPropinsi', 'fileFotoPegawai', 'fileAktaPegawai', 'TanggalLahir'], 'safe'],
            [['JenisKelamin', 'FingerprintPegawai'], 'string'],
            [['NIPLama', 'NIPBaru', 'NIK', 'NomorHandphone', 'NomorTelepon'], 'string', 'max' => 20],
            [['NamaLengkap', 'EmailPegawai', 'CiriKhusus', 'CacatTubuh', 'DokumenAktaLahir', 'KegemaranHobi', 'MasaKerja'], 'string', 'max' => 100],
            [['GelarDepan', 'GelarBelakang', 'NomorRekeningPegawai', 'CabangRekeningPegawai', 'NamaRekeningPegawai'], 'string', 'max' => 50],
            [['FotoPegawai'], 'string', 'max' => 30],
            [['KodeGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['KodeGolonganRuang' => 'IdGolonganRuang']],
            [['WarnaKulit'], 'exist', 'skipOnError' => true, 'targetClass' => TrefWarnaKulit::className(), 'targetAttribute' => ['WarnaKulit' => 'IdWarnaKulit']],
            [['BentukMuka'], 'exist', 'skipOnError' => true, 'targetClass' => TrefBentukMuka::className(), 'targetAttribute' => ['BentukMuka' => 'IdBentukMuka']],
            [['IdSukuBangsa'], 'exist', 'skipOnError' => true, 'targetClass' => TrefSukubangsa::className(), 'targetAttribute' => ['IdSukuBangsa' => 'IdSukuBangsa']],
            [['IdJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatan' => 'IdNamaJabatan']],
            [['KodeBankPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefBank::className(), 'targetAttribute' => ['KodeBankPegawai' => 'IdBank']],
            [['StatusPerkawinan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusPerkawinan::className(), 'targetAttribute' => ['StatusPerkawinan' => 'IdStatusKawin']],
            [['JenisPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisPegawai::className(), 'targetAttribute' => ['JenisPegawai' => 'IdJenisPegawai']],
            [['StatusPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusPegawai::className(), 'targetAttribute' => ['StatusPegawai' => 'IdStatusPegawai']],
            [['Agama'], 'exist', 'skipOnError' => true, 'targetClass' => TrefAgama::className(), 'targetAttribute' => ['Agama' => 'IdAgama']],
            [['KabupatenTempatLahir'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKabupaten::className(), 'targetAttribute' => ['KabupatenTempatLahir' => 'IdKabupaten']],
            [['PropinsiTempatLahir'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPropinsi::className(), 'targetAttribute' => ['PropinsiTempatLahir' => 'IdPropinsi']],
            [['GolonganDarah'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganDarah::className(), 'targetAttribute' => ['GolonganDarah' => 'IdGolonganDarah']],
            [['Rambut'], 'exist', 'skipOnError' => true, 'targetClass' => TrefRambut::className(), 'targetAttribute' => ['Rambut' => 'IdJenisRambut']],
            [['fileFotoPegawai'], 'file', 'extensions' => 'jpg, png', 'maxSize' => 2000 * 1024],
            [['fileAktaPegawai'], 'file', 'extensions' => 'jpg, png, pdf', 'maxSize' => 2000 * 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'IdPegawai' => 'Id Pegawai',
            'NIPLama' => 'Nip Lama',
            'NIPBaru' => 'NIP',
            'NIK' => 'NIK',
            'NamaLengkap' => 'Nama Lengkap',
            'GelarDepan' => 'Gelar Depan',
            'GelarBelakang' => 'Gelar Belakang',
            'KodeGolonganRuang' => 'Golongan Ruang',
            'StatusPerkawinan' => 'Status Perkawinan',
            'JenisPegawai' => 'Jenis Pegawai',
            'StatusPegawai' => 'Status Pegawai',
            'Agama' => 'Agama',
            'EmailPegawai' => 'Email',
            'NomorHandphone' => 'Nomor Handphone',
            'NomorTelepon' => 'Nomor Telepon',
            'TanggalLahir' => 'Tanggal Lahir',
            'KabupatenTempatLahir' => 'Kota Tempat Lahir',
            'PropinsiTempatLahir' => 'Propinsi Tempat Lahir',
            'JenisKelamin' => 'Jenis Kelamin',
            'GolonganDarah' => 'Golongan Darah',
            'TinggiBadan' => 'Tinggi Badan',
            'BeratBadan' => 'Berat Badan',
            'Rambut' => 'Jenis Rambut',
            'WarnaKulit' => 'Warna Kulit',
            'BentukMuka' => 'Bentuk Muka',
            'CiriKhusus' => 'Ciri Khusus',
            'CacatTubuh' => 'Cacat Tubuh',
            'IdSukuBangsa' => 'Suku Bangsa',
            'DokumenAktaLahir' => 'Akta Lahir',
            'KegemaranHobi' => 'Hobi',
            'IdJabatan' => 'Jabatan',
            'MasaKerja' => 'Masa Kerja',
            'FotoPegawai' => 'Foto Pegawai',
            'KodeBankPegawai' => 'Bank',
            'NomorRekeningPegawai' => 'Nomor Rekening',
            'CabangRekeningPegawai' => 'Cabang Rekening',
            'NamaRekeningPegawai' => 'Nama Rekening',
            'FingerprintPegawai' => 'Fingerprint',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstAlamatPegawai() {
        return $this->hasMany(TmstAlamatPegawai::className(), ['IdPegawai' => 'IDPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKartuPegawai() {
        return $this->hasMany(TmstKartuPegawai::className(), ['IdPegawai' => 'IDPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKeluarga() {
        return $this->hasMany(TmstKeluarga::className(), ['IDPegawai' => 'IDPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeGolonganRuang() {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'KodeGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarnaKulit() {
        return $this->hasOne(TrefWarnaKulit::className(), ['IdWarnaKulit' => 'WarnaKulit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBentukMuka() {
        return $this->hasOne(TrefBentukMuka::className(), ['IdBentukMuka' => 'BentukMuka']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSukuBangsa() {
        return $this->hasOne(TrefSukubangsa::className(), ['IdSukuBangsa' => 'IdSukuBangsa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan() {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBankPegawai() {
        return $this->hasOne(TrefBank::className(), ['IdBank' => 'KodeBankPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPerkawinan() {
        return $this->hasOne(TrefStatusPerkawinan::className(), ['IdStatusKawin' => 'StatusPerkawinan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPegawai() {
        return $this->hasOne(TrefJenisPegawai::className(), ['IdJenisPegawai' => 'JenisPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPegawai() {
        return $this->hasOne(TrefStatusPegawai::className(), ['IdStatusPegawai' => 'StatusPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgama() {
        return $this->hasOne(TrefAgama::className(), ['IdAgama' => 'Agama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatenTempatLahir() {
        return $this->hasOne(TrefKabupaten::className(), ['IdKabupaten' => 'KabupatenTempatLahir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsiTempatLahir() {
        return $this->hasOne(TrefPropinsi::className(), ['IdPropinsi' => 'PropinsiTempatLahir']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolonganDarah() {
        return $this->hasOne(TrefGolonganDarah::className(), ['IdGolonganDarah' => 'GolonganDarah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRambut() {
        return $this->hasOne(TrefRambut::className(), ['IdJenisRambut' => 'Rambut']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstUser() {
        return $this->hasMany(TmstUser::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAbsensi() {
        return $this->hasMany(TransAbsensi::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAngkaKredit() {
        return $this->hasMany(TransAngkaKredit::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAssesmentIndividu() {
        return $this->hasMany(TransAssesmentIndividu::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransFitAndProperTes() {
        return $this->hasMany(TransFitAndProperTes::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransForumDetail() {
        return $this->hasMany(TransForumDetail::className(), ['IdPegawaiPembuatForum' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransInsentif() {
        return $this->hasMany(TransInsentif::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar() {
        return $this->hasMany(TransIzinBelajar::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPegawaiJabatanTambahan() {
        return $this->hasMany(TransPegawaiJabatanTambahan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPenguasaanBahasa() {
        return $this->hasMany(TransPenguasaanBahasa::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPeninjauanMasaKerja() {
        return $this->hasMany(TransPeninjauanMasaKerja::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPensiun() {
        return $this->hasMany(TransPensiun::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPesan() {
        return $this->hasMany(TransPesan::className(), ['IdPegawaiPengirim' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPesan0() {
        return $this->hasMany(TransPesan::className(), ['IdPegawaiPenerima' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransProfesiKeahlian() {
        return $this->hasMany(TransProfesiKeahlian::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatBuktiPotongPajak() {
        return $this->hasMany(TransRiwayatBuktiPotongPajak::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatCuti() {
        return $this->hasMany(TransRiwayatCuti::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatCuti0() {
        return $this->hasMany(TransRiwayatCuti::className(), ['IdPegawaiSupervisior' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatFungsional() {
        return $this->hasMany(TransRiwayatDiklatFungsional::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatPerjenjangan() {
        return $this->hasMany(TransRiwayatDiklatPerjenjangan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatPrajabatan() {
        return $this->hasMany(TransRiwayatDiklatPrajabatan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatTeknis() {
        return $this->hasMany(TransRiwayatDiklatTeknis::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDp3() {
        return $this->hasMany(TransRiwayatDp3::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDp30() {
        return $this->hasMany(TransRiwayatDp3::className(), ['IdPejabatPenilai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDp31() {
        return $this->hasMany(TransRiwayatDp3::className(), ['IdAtasanPejabatPenilai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatInpassing() {
        return $this->hasMany(TransRiwayatInpassing::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatInpassing0() {
        return $this->hasMany(TransRiwayatInpassing::className(), ['IdGolonganRuang' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatJabatan() {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatJabatan0() {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdPegawaiAtasan' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKeanggotaanParpol() {
        return $this->hasMany(TransRiwayatKeanggotaanParpol::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKesehatan() {
        return $this->hasMany(TransRiwayatKesehatan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKgb() {
        return $this->hasMany(TransRiwayatKgb::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKursus() {
        return $this->hasMany(TransRiwayatKursus::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatLhkpn() {
        return $this->hasMany(TransRiwayatLhkpn::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatLuarNegeri() {
        return $this->hasMany(TransRiwayatLuarNegeri::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai() {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatOrganisasi() {
        return $this->hasMany(TransRiwayatOrganisasi::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPangkat() {
        return $this->hasMany(TransRiwayatPangkat::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPendidikan() {
        return $this->hasMany(TransRiwayatPendidikan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPenghargaan() {
        return $this->hasMany(TransRiwayatPenghargaan::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPenugasanOperasiMiliter() {
        return $this->hasMany(TransRiwayatPenugasanOperasiMiliter::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPrestasi() {
        return $this->hasMany(TransRiwayatPrestasi::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSanksi() {
        return $this->hasMany(TransRiwayatSanksi::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSeminar() {
        return $this->hasMany(TransRiwayatSeminar::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSkp() {
        return $this->hasMany(TransRiwayatSkp::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSkp0() {
        return $this->hasMany(TransRiwayatSkp::className(), ['IdPegawaiPejabatPenilai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSkp1() {
        return $this->hasMany(TransRiwayatSkp::className(), ['IdPegawaiAtasanPejabatPenilai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatTugasBelajar() {
        return $this->hasMany(TransRiwayatTugasBelajar::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatUjianDinas() {
        return $this->hasMany(TransRiwayatUjianDinas::className(), ['idPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKenaikanPangkat() {
        return $this->hasMany(TransUsulanKenaikanPangkat::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKgbDetail() {
        return $this->hasMany(TransUsulanKgbDetail::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKgbDetail0() {
        return $this->hasMany(TransUsulanKgbDetail::className(), ['IdPejabatUsulanKGBDetil' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpDetail() {
        return $this->hasMany(TransUsulanKpDetail::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpoDetail() {
        return $this->hasMany(TransUsulanKpoDetail::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPakJabatanFungsional() {
        return $this->hasMany(TransUsulanPakJabatanFungsional::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPemberianSatyaLencana() {
        return $this->hasMany(TransUsulanPemberianSatyaLencana::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPensiun() {
        return $this->hasMany(TransUsulanPensiun::className(), ['TanggalUsulanPensiun' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPensiunDetail() {
        return $this->hasMany(TransUsulanPensiunDetail::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPensiunDetail0() {
        return $this->hasMany(TransUsulanPensiunDetail::className(), ['PejabatPembuatSKPensiun' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasi() {
        return $this->hasMany(TransUsulanPromosiMutasi::className(), ['TanggalUsulanPromosiMutasi' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail() {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmHakimDetail() {
        return $this->hasMany(TransUsulanTpmHakimDetail::className(), ['IdPegawai' => 'IdPegawai']);
    }

}
