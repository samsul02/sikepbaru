<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_alamat_pegawai".
 *
 * @property int $IdAlamatPegawai
 * @property int $IdPegawai
 * @property string $AlamatTempatTinggal
 * @property int $JenisAlamat
 * @property string $KelurahanTempatTinggal
 * @property int $KodePropinsiTempatTinggal
 * @property int $KodeKabupatenTempatTinggal
 * @property int $KodeKecamatan
 * @property string $NomorTeleponAlamat
 * @property string $StatusKepemilikanTempatTinggal
 * @property string $FlagHomeBase
 *
 * @property TmstPegawai $pegawai
 * @property TrefJenisAlamat $jenisAlamat
 */
class TmstAlamatPegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmst_alamat_pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPegawai'], 'required'],
            [['IdPegawai', 'JenisAlamat', 'KodePropinsiTempatTinggal', 'KodeKabupatenTempatTinggal', 'KodeKecamatan'], 'integer'],
            [['FlagHomeBase'], 'string'],
            [['AlamatTempatTinggal', 'KelurahanTempatTinggal', 'StatusKepemilikanTempatTinggal'], 'string', 'max' => 100],
            [['NomorTeleponAlamat'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['JenisAlamat'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisAlamat::className(), 'targetAttribute' => ['JenisAlamat' => 'IdJenisAlamat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdAlamatPegawai' => 'Id Alamat Pegawai',
            'IdPegawai' => 'Id Pegawai',
            'AlamatTempatTinggal' => 'Alamat Tempat Tinggal',
            'JenisAlamat' => 'Jenis Alamat',
            'KelurahanTempatTinggal' => 'Kelurahan Tempat Tinggal',
            'KodePropinsiTempatTinggal' => 'Kode Propinsi Tempat Tinggal',
            'KodeKabupatenTempatTinggal' => 'Kode Kabupaten Tempat Tinggal',
            'KodeKecamatan' => 'Kode Kecamatan',
            'NomorTeleponAlamat' => 'Nomor Telepon Alamat',
            'StatusKepemilikanTempatTinggal' => 'Status Kepemilikan Tempat Tinggal',
            'FlagHomeBase' => 'Flag Home Base',
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
    public function getJenisAlamat()
    {
        return $this->hasOne(TrefJenisAlamat::className(), ['IdJenisAlamat' => 'JenisAlamat']);
    }
}
