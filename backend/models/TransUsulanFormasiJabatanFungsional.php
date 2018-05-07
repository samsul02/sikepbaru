<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_formasi_jabatan_fungsional".
 *
 * @property int $IdFormasiJabatanFungsional
 * @property string $TahunFormasi
 * @property int $IdJabatanFungsional
 * @property int $JumlahKebutuhan
 * @property string $TanggalUsulan
 * @property string $NomorSKFormasiPegawai
 * @property string $DokumenSKFormasiPegawai
 *
 * @property TrefJabatan $jabatanFungsional
 */
class TransUsulanFormasiJabatanFungsional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_formasi_jabatan_fungsional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TahunFormasi', 'IdJabatanFungsional', 'JumlahKebutuhan', 'TanggalUsulan', 'NomorSKFormasiPegawai', 'DokumenSKFormasiPegawai'], 'required'],
            [['TahunFormasi', 'TanggalUsulan'], 'safe'],
            [['IdJabatanFungsional', 'JumlahKebutuhan'], 'integer'],
            [['NomorSKFormasiPegawai'], 'string', 'max' => 50],
            [['DokumenSKFormasiPegawai'], 'string', 'max' => 200],
            [['IdJabatanFungsional'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanFungsional' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdFormasiJabatanFungsional' => 'Id Formasi Jabatan Fungsional',
            'TahunFormasi' => 'Tahun Formasi',
            'IdJabatanFungsional' => 'Id Jabatan Fungsional',
            'JumlahKebutuhan' => 'Jumlah Kebutuhan',
            'TanggalUsulan' => 'Tanggal Usulan',
            'NomorSKFormasiPegawai' => 'Nomor Skformasi Pegawai',
            'DokumenSKFormasiPegawai' => 'Dokumen Skformasi Pegawai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanFungsional()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanFungsional']);
    }
}
