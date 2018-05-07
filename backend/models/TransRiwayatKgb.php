<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_kgb".
 *
 * @property int $IdRiwayatKGB
 * @property int $IdPegawai
 * @property int $IdGolonganRuang
 * @property int $IdGajiPokok
 * @property double $BesaranGaji
 * @property string $PejabatPembuatSuratKGB
 * @property string $NomorSuratKGB
 * @property string $TanggalSuratKGB
 * @property string $TMTKGB
 * @property string $DokumenSuratKGB
 * @property int $KPPNKGBPegawai
 * @property string $WilayahKGBPegawai
 *
 * @property TmstPegawai $pegawai
 * @property TrefGolonganRuang $golonganRuang
 * @property TrefGajiPokok $gajiPokok
 * @property TrefKppn $kPPNKGBPegawai
 */
class TransRiwayatKgb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_kgb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdGolonganRuang', 'IdGajiPokok', 'BesaranGaji'], 'required'],
            [['IdPegawai', 'IdGolonganRuang', 'IdGajiPokok', 'KPPNKGBPegawai'], 'integer'],
            [['BesaranGaji'], 'number'],
            [['TanggalSuratKGB', 'TMTKGB'], 'safe'],
            [['PejabatPembuatSuratKGB', 'DokumenSuratKGB', 'WilayahKGBPegawai'], 'string', 'max' => 100],
            [['NomorSuratKGB'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganRuang' => 'IdGolonganRuang']],
            [['IdGajiPokok'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGajiPokok::className(), 'targetAttribute' => ['IdGajiPokok' => 'IdGajiPokok']],
            [['KPPNKGBPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKppn::className(), 'targetAttribute' => ['KPPNKGBPegawai' => 'IdKPPN']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatKGB' => 'Id Riwayat Kgb',
            'IdPegawai' => 'Id Pegawai',
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'IdGajiPokok' => 'Id Gaji Pokok',
            'BesaranGaji' => 'Besaran Gaji',
            'PejabatPembuatSuratKGB' => 'Pejabat Pembuat Surat Kgb',
            'NomorSuratKGB' => 'Nomor Surat Kgb',
            'TanggalSuratKGB' => 'Tanggal Surat Kgb',
            'TMTKGB' => 'Tmtkgb',
            'DokumenSuratKGB' => 'Dokumen Surat Kgb',
            'KPPNKGBPegawai' => 'Kppnkgbpegawai',
            'WilayahKGBPegawai' => 'Wilayah Kgbpegawai',
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
    public function getGolonganRuang()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGajiPokok()
    {
        return $this->hasOne(TrefGajiPokok::className(), ['IdGajiPokok' => 'IdGajiPokok']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKPPNKGBPegawai()
    {
        return $this->hasOne(TrefKppn::className(), ['IdKPPN' => 'KPPNKGBPegawai']);
    }
}
