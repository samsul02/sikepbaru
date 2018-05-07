<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_kursus".
 *
 * @property int $IdRiwayatKursus
 * @property int $IdPegawai
 * @property string $TanggalMulaiKursus
 * @property string $TanggalAkhirKursus
 * @property string $BidangKursus
 * @property string $PenyelenggaraKursus
 * @property string $DokumenKursus
 *
 * @property TmstPegawai $pegawai
 */
class TransRiwayatKursus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_kursus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TanggalMulaiKursus'], 'required'],
            [['IdPegawai'], 'integer'],
            [['TanggalMulaiKursus', 'TanggalAkhirKursus'], 'safe'],
            [['BidangKursus', 'PenyelenggaraKursus'], 'string', 'max' => 50],
            [['DokumenKursus'], 'string', 'max' => 100],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatKursus' => 'Id Riwayat Kursus',
            'IdPegawai' => 'Id Pegawai',
            'TanggalMulaiKursus' => 'Tanggal Mulai Kursus',
            'TanggalAkhirKursus' => 'Tanggal Akhir Kursus',
            'BidangKursus' => 'Bidang Kursus',
            'PenyelenggaraKursus' => 'Penyelenggara Kursus',
            'DokumenKursus' => 'Dokumen Kursus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }
}
