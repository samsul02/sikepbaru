<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_kgb_detail".
 *
 * @property int $IdUsulanKGBDetil
 * @property int $IdUsulanKGB
 * @property int $IdPegawai
 * @property int $IdRiwayatPangkat
 * @property double $BesaranGajiLama
 * @property double $BesaranGajiBaru
 * @property int $IdPejabatUsulanKGBDetil
 * @property string $NamaPejabatUsulanKGBDetil
 * @property string $NomorSuratUsulanKGBDetil
 * @property string $TanggalSuratUsulanKGBDetil
 * @property string $TMTKGB
 * @property int $MasaKerjaGolonganBulan
 * @property int $MasaKerjaGolonganTahun
 *
 * @property TmstPegawai $pegawai
 * @property TmstPegawai $pejabatUsulanKGBDetil
 * @property TransRiwayatPangkat $riwayatPangkat
 */
class TransUsulanKgbDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_kgb_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanKGB', 'IdPegawai', 'IdRiwayatPangkat', 'BesaranGajiLama'], 'required'],
            [['IdUsulanKGB', 'IdPegawai', 'IdRiwayatPangkat', 'IdPejabatUsulanKGBDetil', 'MasaKerjaGolonganBulan', 'MasaKerjaGolonganTahun'], 'integer'],
            [['BesaranGajiLama', 'BesaranGajiBaru'], 'number'],
            [['TanggalSuratUsulanKGBDetil', 'TMTKGB'], 'safe'],
            [['NamaPejabatUsulanKGBDetil'], 'string', 'max' => 100],
            [['NomorSuratUsulanKGBDetil'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdPejabatUsulanKGBDetil'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPejabatUsulanKGBDetil' => 'IdPegawai']],
            [['IdRiwayatPangkat'], 'exist', 'skipOnError' => true, 'targetClass' => TransRiwayatPangkat::className(), 'targetAttribute' => ['IdRiwayatPangkat' => 'IdRiwayatPangkat']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanKGBDetil' => 'Id Usulan Kgbdetil',
            'IdUsulanKGB' => 'Id Usulan Kgb',
            'IdPegawai' => 'Id Pegawai',
            'IdRiwayatPangkat' => 'Id Riwayat Pangkat',
            'BesaranGajiLama' => 'Besaran Gaji Lama',
            'BesaranGajiBaru' => 'Besaran Gaji Baru',
            'IdPejabatUsulanKGBDetil' => 'Id Pejabat Usulan Kgbdetil',
            'NamaPejabatUsulanKGBDetil' => 'Nama Pejabat Usulan Kgbdetil',
            'NomorSuratUsulanKGBDetil' => 'Nomor Surat Usulan Kgbdetil',
            'TanggalSuratUsulanKGBDetil' => 'Tanggal Surat Usulan Kgbdetil',
            'TMTKGB' => 'Tmtkgb',
            'MasaKerjaGolonganBulan' => 'Masa Kerja Golongan Bulan',
            'MasaKerjaGolonganTahun' => 'Masa Kerja Golongan Tahun',
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
    public function getPejabatUsulanKGBDetil()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPejabatUsulanKGBDetil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiwayatPangkat()
    {
        return $this->hasOne(TransRiwayatPangkat::className(), ['IdRiwayatPangkat' => 'IdRiwayatPangkat']);
    }
}
