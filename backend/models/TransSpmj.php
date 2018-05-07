<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_spmj".
 *
 * @property int $IdSPMJ
 * @property int $IdRiwayatJabatanPegawai
 * @property string $NomorSPMJ
 * @property string $TanggalSPMJ
 * @property string $PejabatSPMJ
 * @property string $DokumenSPMJ
 *
 * @property TrefJabatan $riwayatJabatanPegawai
 */
class TransSpmj extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_spmj';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdRiwayatJabatanPegawai'], 'integer'],
            [['TanggalSPMJ'], 'safe'],
            [['NomorSPMJ', 'PejabatSPMJ', 'DokumenSPMJ'], 'string', 'max' => 50],
            [['IdRiwayatJabatanPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdRiwayatJabatanPegawai' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdSPMJ' => 'Id Spmj',
            'IdRiwayatJabatanPegawai' => 'Id Riwayat Jabatan Pegawai',
            'NomorSPMJ' => 'Nomor Spmj',
            'TanggalSPMJ' => 'Tanggal Spmj',
            'PejabatSPMJ' => 'Pejabat Spmj',
            'DokumenSPMJ' => 'Dokumen Spmj',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatJabatanPegawai()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdRiwayatJabatanPegawai']);
    }
}
