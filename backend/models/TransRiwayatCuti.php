<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_cuti".
 *
 * @property int $IdRiwayatCuti
 * @property int $IdPegawai
 * @property int $IdPegawaiSupervisior
 * @property int $IdJenisCuti
 * @property string $TanggalPengajuan
 * @property string $TanggalMulai
 * @property string $TanggalSelesai
 * @property string $AlasanCuti
 * @property int $JumlahHari
 * @property string $DokumenCuti
 * @property int $SisaCutiTahunan
 * @property int $SisaCutiPenangguhan
 *
 * @property TmstPegawai $pegawai
 * @property TmstPegawai $pegawaiSupervisior
 * @property TrefJenisCuti $jenisCuti
 */
class TransRiwayatCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdPegawaiSupervisior', 'IdJenisCuti', 'JumlahHari', 'SisaCutiTahunan', 'SisaCutiPenangguhan'], 'integer'],
            [['TanggalPengajuan', 'TanggalMulai', 'TanggalSelesai'], 'safe'],
            [['SisaCutiTahunan', 'SisaCutiPenangguhan'], 'required'],
            [['AlasanCuti'], 'string', 'max' => 250],
            [['DokumenCuti'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdPegawaiSupervisior'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiSupervisior' => 'IdPegawai']],
            [['IdJenisCuti'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisCuti::className(), 'targetAttribute' => ['IdJenisCuti' => 'IdJenisCuti']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatCuti' => 'Id Riwayat Cuti',
            'IdPegawai' => 'Id Pegawai',
            'IdPegawaiSupervisior' => 'Id Pegawai Supervisior',
            'IdJenisCuti' => 'Id Jenis Cuti',
            'TanggalPengajuan' => 'Tanggal Pengajuan',
            'TanggalMulai' => 'Tanggal Mulai',
            'TanggalSelesai' => 'Tanggal Selesai',
            'AlasanCuti' => 'Alasan Cuti',
            'JumlahHari' => 'Jumlah Hari',
            'DokumenCuti' => 'Dokumen Cuti',
            'SisaCutiTahunan' => 'Sisa Cuti Tahunan',
            'SisaCutiPenangguhan' => 'Sisa Cuti Penangguhan',
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
    public function getPegawaiSupervisior()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiSupervisior']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisCuti()
    {
        return $this->hasOne(TrefJenisCuti::className(), ['IdJenisCuti' => 'IdJenisCuti']);
    }
}
