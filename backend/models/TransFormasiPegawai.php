<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_formasi_pegawai".
 *
 * @property int $IdFormasiPegawai
 * @property string $TahunFormasi
 * @property string $TanggalUsulan
 * @property string $NomorSKFormasiPegawai
 * @property string $DokumenSKFormasiPegawai
 */
class TransFormasiPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_formasi_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TahunFormasi', 'TanggalUsulan', 'NomorSKFormasiPegawai', 'DokumenSKFormasiPegawai'], 'required'],
            [['TahunFormasi', 'TanggalUsulan'], 'safe'],
            [['NomorSKFormasiPegawai'], 'string', 'max' => 50],
            [['DokumenSKFormasiPegawai'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdFormasiPegawai' => 'Id Formasi Pegawai',
            'TahunFormasi' => 'Tahun Formasi',
            'TanggalUsulan' => 'Tanggal Usulan',
            'NomorSKFormasiPegawai' => 'Nomor Skformasi Pegawai',
            'DokumenSKFormasiPegawai' => 'Dokumen Skformasi Pegawai',
        ];
    }
}
