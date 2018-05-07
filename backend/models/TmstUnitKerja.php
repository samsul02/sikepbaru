<?php

namespace backend\modelscurrent;

use Yii;

/**
 * This is the model class for table "tmst_unit_kerja".
 *
 * @property int $IdUnitKerja
 * @property int $IdParentUnitKerja
 * @property int $LevelUnitKerja
 * @property int $KodeUnitKerja
 * @property string $NamaUnitKerja
 * @property int $UrutanUnitKerja
 *
 * @property TmstStrukturOrganisasi[] $tmstStrukturOrganisasi
 * @property TmstUnitKerja $parentUnitKerja
 * @property TmstUnitKerja[] $tmstUnitKerja
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
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_unit_kerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdParentUnitKerja', 'LevelUnitKerja', 'KodeUnitKerja'], 'required'],
            [['IdParentUnitKerja', 'LevelUnitKerja', 'KodeUnitKerja', 'UrutanUnitKerja'], 'integer'],
            [['NamaUnitKerja'], 'string', 'max' => 50],
            [['IdParentUnitKerja'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdParentUnitKerja' => 'IdUnitKerja']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUnitKerja' => 'Id Unit Kerja',
            'IdParentUnitKerja' => 'Id Parent Unit Kerja',
            'LevelUnitKerja' => 'Level Unit Kerja',
            'KodeUnitKerja' => 'Kode Unit Kerja',
            'NamaUnitKerja' => 'Nama Unit Kerja',
            'UrutanUnitKerja' => 'Urutan Unit Kerja',
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
    public function getParentUnitKerja()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdParentUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstUnitKerja()
    {
        return $this->hasMany(TmstUnitKerja::className(), ['IdParentUnitKerja' => 'IdUnitKerja']);
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
