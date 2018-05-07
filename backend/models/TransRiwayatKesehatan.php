<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_kesehatan".
 *
 * @property int $IdRiwayatKesehatan
 * @property int $IdPegawai
 * @property string $NomorSuratKesehatan
 * @property string $TanggalSuratKesehatan
 * @property string $InstansiSuratKesehatan
 * @property string $PejabatSuratKesehatan
 * @property string $DokumenSuratKesehatan
 * @property string $Keperluan
 * @property int $KategoriSakit
 * @property string $NamaPenyakit
 * @property string $TanggalMulaiSakit
 * @property string $TanggalAkhirSakit
 * @property string $Catatan
 *
 * @property TmstPegawai $pegawai
 * @property TrefKategoriSakit $kategoriSakit
 */
class TransRiwayatKesehatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_kesehatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'NomorSuratKesehatan', 'TanggalSuratKesehatan'], 'required'],
            [['IdPegawai', 'KategoriSakit'], 'integer'],
            [['TanggalSuratKesehatan', 'TanggalMulaiSakit', 'TanggalAkhirSakit'], 'safe'],
            [['NomorSuratKesehatan', 'InstansiSuratKesehatan'], 'string', 'max' => 50],
            [['PejabatSuratKesehatan'], 'string', 'max' => 100],
            [['DokumenSuratKesehatan', 'Keperluan', 'NamaPenyakit', 'Catatan'], 'string', 'max' => 255],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['KategoriSakit'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKategoriSakit::className(), 'targetAttribute' => ['KategoriSakit' => 'IdKategoriSakit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatKesehatan' => 'Id Riwayat Kesehatan',
            'IdPegawai' => 'Id Pegawai',
            'NomorSuratKesehatan' => 'Nomor Surat Kesehatan',
            'TanggalSuratKesehatan' => 'Tanggal Surat Kesehatan',
            'InstansiSuratKesehatan' => 'Instansi Surat Kesehatan',
            'PejabatSuratKesehatan' => 'Pejabat Surat Kesehatan',
            'DokumenSuratKesehatan' => 'Dokumen Surat Kesehatan',
            'Keperluan' => 'Keperluan',
            'KategoriSakit' => 'Kategori Sakit',
            'NamaPenyakit' => 'Nama Penyakit',
            'TanggalMulaiSakit' => 'Tanggal Mulai Sakit',
            'TanggalAkhirSakit' => 'Tanggal Akhir Sakit',
            'Catatan' => 'Catatan',
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
    public function getKategoriSakit()
    {
        return $this->hasOne(TrefKategoriSakit::className(), ['IdKategoriSakit' => 'KategoriSakit']);
    }
}
