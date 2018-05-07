<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_cuti".
 *
 * @property int $IdUsulanCuti
 * @property string $IdPegawai
 * @property string $NamaPegawai
 * @property int $IdJabatanPegawai
 * @property int $UnitKerjaPegawai
 * @property int $JenisCuti
 * @property string $TanggalPengajuan
 * @property string $TanggalMulaiCuti
 * @property string $TanggalSelesaiCuti
 * @property int $JumlahCuti
 * @property int $IdPegawaiAtasan
 * @property string $NamaAtasan
 * @property int $IdJabatanAtasan
 * @property string $AlamatCuti
 * @property string $TeleponCuti
 */
class TransUsulanCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanCuti'], 'required'],
            [['IdUsulanCuti', 'IdJabatanPegawai', 'UnitKerjaPegawai', 'JenisCuti', 'JumlahCuti', 'IdPegawaiAtasan', 'IdJabatanAtasan'], 'integer'],
            [['TanggalPengajuan', 'TanggalMulaiCuti', 'TanggalSelesaiCuti'], 'safe'],
            [['IdPegawai', 'TeleponCuti'], 'string', 'max' => 20],
            [['NamaPegawai', 'NamaAtasan'], 'string', 'max' => 150],
            [['AlamatCuti'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanCuti' => 'Id Usulan Cuti',
            'IdPegawai' => 'Id Pegawai',
            'NamaPegawai' => 'Nama Pegawai',
            'IdJabatanPegawai' => 'Id Jabatan Pegawai',
            'UnitKerjaPegawai' => 'Unit Kerja Pegawai',
            'JenisCuti' => 'Jenis Cuti',
            'TanggalPengajuan' => 'Tanggal Pengajuan',
            'TanggalMulaiCuti' => 'Tanggal Mulai Cuti',
            'TanggalSelesaiCuti' => 'Tanggal Selesai Cuti',
            'JumlahCuti' => 'Jumlah Cuti',
            'IdPegawaiAtasan' => 'Id Pegawai Atasan',
            'NamaAtasan' => 'Nama Atasan',
            'IdJabatanAtasan' => 'Id Jabatan Atasan',
            'AlamatCuti' => 'Alamat Cuti',
            'TeleponCuti' => 'Telepon Cuti',
        ];
    }
}
