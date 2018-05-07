<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_satker".
 *
 * @property int $IdSatker
 * @property int $ParentIdSatker
 * @property int $LevelSatker
 * @property string $KodeSatker
 * @property int $IdKlasPengadilan
 * @property int $IdBandingLingkunganPeradilan
 * @property int $IdJenisSatker
 * @property string $NamaSatker
 * @property int $MinimalJumlahHakim
 * @property int $MaksimalJumlahHakim
 * @property int $MinimalJumlahPanitera
 * @property int $MaksimalJumlahPanitera
 * @property string $AlamatSatker
 * @property int $IdPropinsiSatker
 * @property int $IdKabupatenSatker
 * @property int $IdPulauSatker
 * @property string $WebsiteSatker
 * @property string $TeleponSatker
 *
 * @property TrefLingkunganPeradilan $bandingLingkunganPeradilan
 * @property TrefKabupaten $kabupatenSatker
 * @property TrefKlasPengadilan $klasPengadilan
 * @property TrefPropinsi $propinsiSatker
 * @property TrefPulau $pulauSatker
 * @property TransBudgetingUnit[] $transBudgetingUnit
 * @property TransFormasiPegawaiDetail[] $transFormasiPegawaiDetail
 * @property TransForum[] $transForum
 * @property TransForumDetail[] $transForumDetail
 * @property TransRiwayatJabatan[] $transRiwayatJabatan
 * @property TransRiwayatKlasPengadilan[] $transRiwayatKlasPengadilan
 * @property TransRiwayatKlasPengadilan[] $transRiwayatKlasPengadilan0
 * @property TransRiwayatKlasPengadilan[] $transRiwayatKlasPengadilan1
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai0
 * @property TransUsulanKgb[] $transUsulanKgb
 * @property TransUsulanKp[] $transUsulanKp
 * @property TransUsulanPesertaDiklat[] $transUsulanPesertaDiklat
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail0
 * @property TransUsulanRestrukturisasi[] $transUsulanRestrukturisasi
 * @property TransUsulanTpmHakim[] $transUsulanTpmHakim
 * @property TransUsulanTpmHakimDetail[] $transUsulanTpmHakimDetail
 * @property TransUsulanTpmPnppjs[] $transUsulanTpmPnppjs
 * @property TransUsulanTpmPnppjsDetail[] $transUsulanTpmPnppjsDetail
 * @property TrefBiayaTransportMutasi[] $trefBiayaTransportMutasi
 * @property TrefBiayaTransportMutasi[] $trefBiayaTransportMutasi0
 */
class TmstSatker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_satker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ParentIdSatker', 'LevelSatker', 'IdKlasPengadilan', 'IdBandingLingkunganPeradilan', 'IdJenisSatker', 'MinimalJumlahHakim', 'MaksimalJumlahHakim', 'MinimalJumlahPanitera', 'MaksimalJumlahPanitera', 'IdPropinsiSatker', 'IdKabupatenSatker', 'IdPulauSatker'], 'integer'],
            [['KodeSatker', 'NamaSatker'], 'required'],
            [['KodeSatker'], 'string', 'max' => 8],
            [['NamaSatker', 'AlamatSatker'], 'string', 'max' => 100],
            [['WebsiteSatker'], 'string', 'max' => 50],
            [['TeleponSatker'], 'string', 'max' => 15],
            [['IdBandingLingkunganPeradilan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefLingkunganPeradilan::className(), 'targetAttribute' => ['IdBandingLingkunganPeradilan' => 'IdLingkunganPeradilan']],
            [['IdKabupatenSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKabupaten::className(), 'targetAttribute' => ['IdKabupatenSatker' => 'IdKabupaten']],
            [['IdKlasPengadilan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKlasPengadilan::className(), 'targetAttribute' => ['IdKlasPengadilan' => 'IdKlasPengadilan']],
            [['IdPropinsiSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPropinsi::className(), 'targetAttribute' => ['IdPropinsiSatker' => 'IdPropinsi']],
            [['IdPulauSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPulau::className(), 'targetAttribute' => ['IdPulauSatker' => 'IdPulau']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdSatker' => 'Id Satker',
            'ParentIdSatker' => 'Parent Id Satker',
            'LevelSatker' => 'Level Satker',
            'KodeSatker' => 'Kode Satker',
            'IdKlasPengadilan' => 'Id Klas Pengadilan',
            'IdBandingLingkunganPeradilan' => 'Id Banding Lingkungan Peradilan',
            'IdJenisSatker' => 'Id Jenis Satker',
            'NamaSatker' => 'Nama Satker',
            'MinimalJumlahHakim' => 'Minimal Jumlah Hakim',
            'MaksimalJumlahHakim' => 'Maksimal Jumlah Hakim',
            'MinimalJumlahPanitera' => 'Minimal Jumlah Panitera',
            'MaksimalJumlahPanitera' => 'Maksimal Jumlah Panitera',
            'AlamatSatker' => 'Alamat Satker',
            'IdPropinsiSatker' => 'Id Propinsi Satker',
            'IdKabupatenSatker' => 'Id Kabupaten Satker',
            'IdPulauSatker' => 'Id Pulau Satker',
            'WebsiteSatker' => 'Website Satker',
            'TeleponSatker' => 'Telepon Satker',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBandingLingkunganPeradilan()
    {
        return $this->hasOne(TrefLingkunganPeradilan::className(), ['IdLingkunganPeradilan' => 'IdBandingLingkunganPeradilan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatenSatker()
    {
        return $this->hasOne(TrefKabupaten::className(), ['IdKabupaten' => 'IdKabupatenSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlasPengadilan()
    {
        return $this->hasOne(TrefKlasPengadilan::className(), ['IdKlasPengadilan' => 'IdKlasPengadilan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsiSatker()
    {
        return $this->hasOne(TrefPropinsi::className(), ['IdPropinsi' => 'IdPropinsiSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPulauSatker()
    {
        return $this->hasOne(TrefPulau::className(), ['IdPulau' => 'IdPulauSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransBudgetingUnit()
    {
        return $this->hasMany(TransBudgetingUnit::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransFormasiPegawaiDetail()
    {
        return $this->hasMany(TransFormasiPegawaiDetail::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransForum()
    {
        return $this->hasMany(TransForum::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransForumDetail()
    {
        return $this->hasMany(TransForumDetail::className(), ['IdSatkerForumDetail' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatJabatan()
    {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKlasPengadilan()
    {
        return $this->hasMany(TransRiwayatKlasPengadilan::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKlasPengadilan0()
    {
        return $this->hasMany(TransRiwayatKlasPengadilan::className(), ['IdKlasPengadilanLama' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKlasPengadilan1()
    {
        return $this->hasMany(TransRiwayatKlasPengadilan::className(), ['IdKlasPengadilanBaru' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai()
    {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdSatkerAsal' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai0()
    {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdSatkerTujuan' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKgb()
    {
        return $this->hasMany(TransUsulanKgb::className(), ['IdSatkerUsulanKGB' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKp()
    {
        return $this->hasMany(TransUsulanKp::className(), ['IdSatkerUsulanKP' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPesertaDiklat()
    {
        return $this->hasMany(TransUsulanPesertaDiklat::className(), ['IdSatkerPegawai' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdSatkerAsal' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail0()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdSatkerTujuan' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanRestrukturisasi()
    {
        return $this->hasMany(TransUsulanRestrukturisasi::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmHakim()
    {
        return $this->hasMany(TransUsulanTpmHakim::className(), ['IdSatkerUsulanTPMHakim' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmHakimDetail()
    {
        return $this->hasMany(TransUsulanTpmHakimDetail::className(), ['KodeSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmPnppjs()
    {
        return $this->hasMany(TransUsulanTpmPnppjs::className(), ['IdSatkerUsulanTPMPNPPJS' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmPnppjsDetail()
    {
        return $this->hasMany(TransUsulanTpmPnppjsDetail::className(), ['IdSatkerUsulan' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefBiayaTransportMutasi()
    {
        return $this->hasMany(TrefBiayaTransportMutasi::className(), ['KodeSatkerAsalMutasi' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefBiayaTransportMutasi0()
    {
        return $this->hasMany(TrefBiayaTransportMutasi::className(), ['KodeSatkerTujuanMutasi' => 'IdSatker']);
    }
}
