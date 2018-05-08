<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_unit_kerja".
 *
 * @property int $IdUnitKerja
 * @property string $NamaUnitKerja
 *
 * @property TmstStrukturOrganisasi[] $tmstStrukturOrganisasi
 * @property TransBudgetingUnit[] $transBudgetingUnit
 * @property TransFormasiPegawaiDetail[] $transFormasiPegawaiDetail
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransPegawaiJabatanTambahan[] $transPegawaiJabatanTambahan
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai
 * @property TransRiwayatMutasiPegawai[] $transRiwayatMutasiPegawai0
 * @property TransUsulanPensiunDetail[] $transUsulanPensiunDetail
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail0
 */
class TmstUnitKerja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tmst_unit_kerja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NamaUnitKerja'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUnitKerja' => 'Id Unit Kerja',
            'NamaUnitKerja' => 'Nama Unit Kerja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstStrukturOrganisasi()
    {
        return $this->hasMany(TmstStrukturOrganisasi::className(), ['IdUnitKerja' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransBudgetingUnit()
    {
        return $this->hasMany(TransBudgetingUnit::className(), ['IdUnitKerja' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransFormasiPegawaiDetail()
    {
        return $this->hasMany(TransFormasiPegawaiDetail::className(), ['IdUnitKerja' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdUnitKerjaPegawai' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPegawaiJabatanTambahan()
    {
        return $this->hasMany(TransPegawaiJabatanTambahan::className(), ['IdUnitKerjaTambahan' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai()
    {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdUnitKerjaAsal' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatMutasiPegawai0()
    {
        return $this->hasMany(TransRiwayatMutasiPegawai::className(), ['IdUnitKerjaTujuan' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPensiunDetail()
    {
        return $this->hasMany(TransUsulanPensiunDetail::className(), ['IdUnitKerjaPegawai' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdUnitKerjaAsal' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail0()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdUnitKerjaTujuan' => 'IdUnitKerja']);
    }
}
