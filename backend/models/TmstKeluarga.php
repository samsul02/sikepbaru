<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_keluarga".
 *
 * @property int $IdAnggotaKeluarga
 * @property int $IDPegawai
 * @property int $JenisHubunganKeluarga
 * @property string $UrutanHubunganKeluarga 
 * @property string $JenisKelamin
 * @property string $NamaAnggotaKeluarga
 * @property string $TempatLahirAnggotaKeluarga
 * @property string $TanggalLahirAnggotaKeluarga
 * @property int $PekerjaanAnggotaKeluarga
 * @property string $AlamatKantorAnggotaKeluarga
 * @property int $NoIndukPegawaiKeluarga
 * @property int $Agama
 * @property int $StatusPerkawinan
 * @property string $TanggalNikah
 * @property string $StatusKesehatan
 * @property int $PendidikanTerakhir
 * @property string $IsHidup
 * @property string $BerhakTunjangan
 * @property string $DokumenHubunganKeluarga
 * @property string $NomorKARIS_KARSU
 * @property string $FotoAnggotaKeluarga
 *
 * @property TrefHubunganKeluarga $jenisHubunganKeluarga
 * @property TmstPegawai $pegawai
 * @property TrefAgama $agama
 * @property TrefPekerjaan $pekerjaanAnggotaKeluarga
 * @property TrefStatusPerkawinan $statusPerkawinan
 * @property TrefTingkatPendidikan $pendidikanTerakhir
 */
class TmstKeluarga extends \yii\db\ActiveRecord {

    public $fileDokumenAnak;
    public $fileFotoAnak;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'tmst_keluarga';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['IDPegawai', 'JenisHubunganKeluarga', 'NamaAnggotaKeluarga', 'TempatLahirAnggotaKeluarga', 'StatusPerkawinan'], 'required'],
            [['IDPegawai', 'JenisHubunganKeluarga', 'PekerjaanAnggotaKeluarga', 'NoIndukPegawaiKeluarga', 'Agama', 'StatusPerkawinan', 'PendidikanTerakhir'], 'integer'],
            [['JenisKelamin', 'IsHidup', 'BerhakTunjangan'], 'string'],
            [['TanggalLahirAnggotaKeluarga', 'TanggalNikah'], 'safe'],
            [['UrutanHubunganKeluarga'], 'string', 'max' => 2],
            [['NamaAnggotaKeluarga', 'AlamatKantorAnggotaKeluarga', 'StatusKesehatan', 'DokumenHubunganKeluarga'], 'string', 'max' => 100],
            [['TempatLahirAnggotaKeluarga'], 'string', 'max' => 50],
            [['NomorKARIS_KARSU'], 'string', 'max' => 20],
            [['FotoAnggotaKeluarga'], 'string', 'max' => 255],
            [['JenisHubunganKeluarga'], 'exist', 'skipOnError' => true, 'targetClass' => TrefHubunganKeluarga::className(), 'targetAttribute' => ['JenisHubunganKeluarga' => 'IdHubunganKeluarga']],
            [['IDPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IDPegawai' => 'IdPegawai']], 
            [['Agama'], 'exist', 'skipOnError' => true, 'targetClass' => TrefAgama::className(), 'targetAttribute' => ['Agama' => 'IdAgama']],
            [['PekerjaanAnggotaKeluarga'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPekerjaan::className(), 'targetAttribute' => ['PekerjaanAnggotaKeluarga' => 'IdPekerjaan']],
            [['StatusPerkawinan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusPerkawinan::className(), 'targetAttribute' => ['StatusPerkawinan' => 'IdStatusKawin']],
            [['PendidikanTerakhir'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['PendidikanTerakhir' => 'IdRefTingkatPendidikan']],
            [['fileDokumenAnak'], 'file', 'extensions' => 'jpg, png, pdf', 'maxSize' => 2000 * 1024],
            [['fileFotoAnak'], 'file', 'extensions' => 'jpg, png', 'maxSize' => 2000 * 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'IdAnggotaKeluarga' => 'Id Anggota Keluarga',
            'IDPegawai' => 'Idpegawai',
            'JenisHubunganKeluarga' => 'Jenis Hubungan Keluarga',
            'UrutanHubunganKeluarga' => 'Urutan Hubungan Keluarga',
            'JenisKelamin' => 'Jenis Kelamin',
            'NamaAnggotaKeluarga' => 'Nama Anggota Keluarga',
            'TempatLahirAnggotaKeluarga' => 'Tempat Lahir Anggota Keluarga',
            'TanggalLahirAnggotaKeluarga' => 'Tanggal Lahir Anggota Keluarga',
            'PekerjaanAnggotaKeluarga' => 'Pekerjaan Anggota Keluarga',
            'AlamatKantorAnggotaKeluarga' => 'Alamat Kantor Anggota Keluarga',
            'NoIndukPegawaiKeluarga' => 'No Induk Pegawai Keluarga',
            'Agama' => 'Agama',
            'StatusPerkawinan' => 'Status Perkawinan',
            'TanggalNikah' => 'Tanggal Nikah',
            'StatusKesehatan' => 'Status Kesehatan',
            'PendidikanTerakhir' => 'Pendidikan Terakhir',
            'IsHidup' => 'Is Hidup',
            'BerhakTunjangan' => 'Berhak Tunjangan',
            'DokumenHubunganKeluarga' => 'Dokumen Hubungan Keluarga',
            'NomorKARIS_KARSU' => 'Nomor Karis  Karsu',
            'FotoAnggotaKeluarga' => 'Foto Anggota Keluarga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisHubunganKeluarga() {
        return $this->hasOne(TrefHubunganKeluarga::className(), ['IdHubunganKeluarga' => 'JenisHubunganKeluarga']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai() {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IDPegawai']);
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
    public function getPekerjaanAnggotaKeluarga() {
        return $this->hasOne(TrefPekerjaan::className(), ['IdPekerjaan' => 'PekerjaanAnggotaKeluarga']);
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
    public function getPendidikanTerakhir() {
        return $this->hasOne(TrefTingkatPendidikan::className(), ['IdRefTingkatPendidikan' => 'PendidikanTerakhir']);
    }

}
