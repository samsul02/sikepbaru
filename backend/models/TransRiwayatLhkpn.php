<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_lhkpn".
 *
 * @property int $IdRiwayatLHKPN
 * @property int $IdPegawai
 * @property int $StatusPelaporan
 * @property string $DokumenBuktiKirim
 * @property string $TahunLHKPN
 * @property string $TglKirimLaporan
 *
 * @property TmstPegawai $pegawai
 * @property TrefStatusPelaporanLhkpn $statusPelaporan
 */
class TransRiwayatLhkpn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_lhkpn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'StatusPelaporan', 'DokumenBuktiKirim', 'TahunLHKPN', 'TglKirimLaporan'], 'required'],
            [['IdPegawai', 'StatusPelaporan'], 'integer'],
            [['TglKirimLaporan'], 'safe'],
            [['DokumenBuktiKirim'], 'string', 'max' => 25],
            [['TahunLHKPN'], 'string', 'max' => 4],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['StatusPelaporan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusPelaporanLhkpn::className(), 'targetAttribute' => ['StatusPelaporan' => 'IdStatusPelaporan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatLHKPN' => 'Id Riwayat Lhkpn',
            'IdPegawai' => 'Id Pegawai',
            'StatusPelaporan' => 'Status Pelaporan',
            'DokumenBuktiKirim' => 'Dokumen Bukti Kirim',
            'TahunLHKPN' => 'Tahun Lhkpn',
            'TglKirimLaporan' => 'Tgl Kirim Laporan',
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
    public function getStatusPelaporan()
    {
        return $this->hasOne(TrefStatusPelaporanLhkpn::className(), ['IdStatusPelaporan' => 'StatusPelaporan']);
    }
}
