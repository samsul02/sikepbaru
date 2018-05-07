<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jabatan".
 *
 * @property int $IdNamaJabatan
 * @property int $UrutanJabatan
 * @property int $IdPosisiJabatan
 * @property string $NamaJabatan
 * @property string $SingkatanNamaJabatan
 * @property string $KeteranganNamaJabatan
 * @property int $UsiaPensiunJabatan
 * @property double $MinimumAngaKreditJabatan
 *
 * @property TmstKompetensiJabatan[] $tmstKompetensiJabatan
 * @property TmstListJabatanOrganisasi[] $tmstListJabatanOrganisasi
 * @property TmstPegawai[] $tmstPegawai
 * @property TmstStrukturOrganisasi[] $tmstStrukturOrganisasi
 * @property TransFormasiPegawaiDetail[] $transFormasiPegawaiDetail
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransPegawaiJabatanTambahan[] $transPegawaiJabatanTambahan
 * @property TransRiwayatJabatan[] $transRiwayatJabatan
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai0
 * @property TransRiwayatOrganisasi[] $transRiwayatOrganisasi
 * @property TransRoleWorkflowDetail[] $transRoleWorkflowDetail
 * @property TransRoleWorkflowDetail[] $transRoleWorkflowDetail0
 * @property TransSpmj[] $transSpmj
 * @property TransUsulanFormasiJabatanFungsional[] $transUsulanFormasiJabatanFungsional
 * @property TransUsulanPensiunDetail[] $transUsulanPensiunDetail
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail0
 * @property TransUsulanTpmHakimDetail[] $transUsulanTpmHakimDetail
 * @property TransUsulanTpmPnppjsDetail[] $transUsulanTpmPnppjsDetail
 * @property TrefPosisiJabatan $posisiJabatan
 */
class TrefJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UrutanJabatan', 'IdPosisiJabatan', 'NamaJabatan'], 'required'],
            [['UrutanJabatan', 'IdPosisiJabatan', 'UsiaPensiunJabatan'], 'integer'],
            [['MinimumAngaKreditJabatan'], 'number'],
            [['NamaJabatan', 'SingkatanNamaJabatan'], 'string', 'max' => 150],
            [['KeteranganNamaJabatan'], 'string', 'max' => 255],
            [['IdPosisiJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPosisiJabatan::className(), 'targetAttribute' => ['IdPosisiJabatan' => 'IdPosisiJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdNamaJabatan' => 'Id Nama Jabatan',
            'UrutanJabatan' => 'Urutan Jabatan',
            'IdPosisiJabatan' => 'Id Posisi Jabatan',
            'NamaJabatan' => 'Nama Jabatan',
            'SingkatanNamaJabatan' => 'Singkatan Nama Jabatan',
            'KeteranganNamaJabatan' => 'Keterangan Nama Jabatan',
            'UsiaPensiunJabatan' => 'Usia Pensiun Jabatan',
            'MinimumAngaKreditJabatan' => 'Minimum Anga Kredit Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKompetensiJabatan()
    {
        return $this->hasMany(TmstKompetensiJabatan::className(), ['IdJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstListJabatanOrganisasi()
    {
        return $this->hasMany(TmstListJabatanOrganisasi::className(), ['IdJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['IdJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstStrukturOrganisasi()
    {
        return $this->hasMany(TmstStrukturOrganisasi::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransFormasiPegawaiDetail()
    {
        return $this->hasMany(TransFormasiPegawaiDetail::className(), ['IdJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdJabatanPegawai' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPegawaiJabatanTambahan()
    {
        return $this->hasMany(TransPegawaiJabatanTambahan::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatJabatan()
    {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai()
    {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdJabatanAsal' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai0()
    {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdJabatanTujuan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatOrganisasi()
    {
        return $this->hasMany(TransRiwayatOrganisasi::className(), ['IdJabatanOrganisasi' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRoleWorkflowDetail()
    {
        return $this->hasMany(TransRoleWorkflowDetail::className(), ['IdJabatanStruktural' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRoleWorkflowDetail0()
    {
        return $this->hasMany(TransRoleWorkflowDetail::className(), ['IdJabatanFungsional' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransSpmj()
    {
        return $this->hasMany(TransSpmj::className(), ['IdRiwayatJabatanPegawai' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanFormasiJabatanFungsional()
    {
        return $this->hasMany(TransUsulanFormasiJabatanFungsional::className(), ['IdJabatanFungsional' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPensiunDetail()
    {
        return $this->hasMany(TransUsulanPensiunDetail::className(), ['IdJabatanPegawi' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdJabatanAsal' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail0()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdJabatanTujuan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmHakimDetail()
    {
        return $this->hasMany(TransUsulanTpmHakimDetail::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmPnppjsDetail()
    {
        return $this->hasMany(TransUsulanTpmPnppjsDetail::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosisiJabatan()
    {
        return $this->hasOne(TrefPosisiJabatan::className(), ['IdPosisiJabatan' => 'IdPosisiJabatan']);
    }
}
