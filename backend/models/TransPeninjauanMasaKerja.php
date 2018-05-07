<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_peninjauan_masa_kerja".
 *
 * @property int $IdPeninjauanMasaKerja
 * @property int $IdPegawai
 * @property int $IdRiwayatPangkat
 * @property int $JenisPMK 1. PENAMBAHAN MASA KERJA, 2 PENGURANGAN MASA KERJA
 * @property string $NomorPersetujuanBKN
 * @property string $TanggalPersetujuanBKN
 * @property int $MasaKerja
 * @property string $TanggalAwal
 * @property string $TanggalAkhir
 * @property string $DokumenPMK
 *
 * @property TmstPegawai $pegawai
 * @property TransRiwayatPangkat $riwayatPangkat
 */
class TransPeninjauanMasaKerja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_peninjauan_masa_kerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdRiwayatPangkat', 'JenisPMK', 'NomorPersetujuanBKN', 'TanggalPersetujuanBKN', 'MasaKerja', 'TanggalAwal', 'TanggalAkhir'], 'required'],
            [['IdPegawai', 'IdRiwayatPangkat', 'JenisPMK', 'MasaKerja'], 'integer'],
            [['TanggalPersetujuanBKN', 'TanggalAwal', 'TanggalAkhir'], 'safe'],
            [['NomorPersetujuanBKN', 'DokumenPMK'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdRiwayatPangkat'], 'exist', 'skipOnError' => true, 'targetClass' => TransRiwayatPangkat::className(), 'targetAttribute' => ['IdRiwayatPangkat' => 'IdRiwayatPangkat']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPeninjauanMasaKerja' => 'Id Peninjauan Masa Kerja',
            'IdPegawai' => 'Id Pegawai',
            'IdRiwayatPangkat' => 'Id Riwayat Pangkat',
            'JenisPMK' => 'Jenis Pmk',
            'NomorPersetujuanBKN' => 'Nomor Persetujuan Bkn',
            'TanggalPersetujuanBKN' => 'Tanggal Persetujuan Bkn',
            'MasaKerja' => 'Masa Kerja',
            'TanggalAwal' => 'Tanggal Awal',
            'TanggalAkhir' => 'Tanggal Akhir',
            'DokumenPMK' => 'Dokumen Pmk',
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
    public function getRiwayatPangkat()
    {
        return $this->hasOne(TransRiwayatPangkat::className(), ['IdRiwayatPangkat' => 'IdRiwayatPangkat']);
    }
}
