<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_promosi_mutasi_detail".
 *
 * @property int $IdUsulanPromosiMutasiDetail
 * @property int $IdUsulanPromosiMutasi
 * @property int $IdPegawai
 * @property int $IdSatkerAsal
 * @property int $IdUnitKerjaAsal
 * @property int $IdLokasi
 * @property int $IdJabatanAsal
 * @property int $IdSatkerTujuan
 * @property int $IdUnitKerjaTujuan
 * @property int $IdJabatanTujuan
 * @property string $StatusUsulan
 * @property string $UsulanbiayaMutasi
 *
 * @property TmstPegawai $pegawai
 * @property TmstSatker $satkerAsal
 * @property TmstSatker $satkerTujuan
 * @property TmstUnitKerja $unitKerjaAsal
 * @property TmstUnitKerja $unitKerjaTujuan
 * @property TransUsulanPromosiMutasi $usulanPromosiMutasi
 * @property TrefJabatan $jabatanAsal
 * @property TrefJabatan $jabatanTujuan
 * @property TrefLokasi $lokasi
 */
class TransUsulanPromosiMutasiDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_promosi_mutasi_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanPromosiMutasi', 'IdPegawai', 'IdSatkerAsal', 'IdUnitKerjaAsal', 'IdLokasi', 'IdJabatanAsal', 'IdSatkerTujuan', 'IdUnitKerjaTujuan', 'IdJabatanTujuan'], 'required'],
            [['IdUsulanPromosiMutasi', 'IdPegawai', 'IdSatkerAsal', 'IdUnitKerjaAsal', 'IdLokasi', 'IdJabatanAsal', 'IdSatkerTujuan', 'IdUnitKerjaTujuan', 'IdJabatanTujuan'], 'integer'],
            [['StatusUsulan', 'UsulanbiayaMutasi'], 'string', 'max' => 10],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdSatkerAsal'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerAsal' => 'IdSatker']],
            [['IdSatkerTujuan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerTujuan' => 'IdSatker']],
            [['IdUnitKerjaAsal'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaAsal' => 'IdUnitKerja']],
            [['IdUnitKerjaTujuan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaTujuan' => 'IdUnitKerja']],
            [['IdUsulanPromosiMutasi'], 'exist', 'skipOnError' => true, 'targetClass' => TransUsulanPromosiMutasi::className(), 'targetAttribute' => ['IdUsulanPromosiMutasi' => 'IdUsulanPromosiMutasi']],
            [['IdJabatanAsal'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanAsal' => 'IdNamaJabatan']],
            [['IdJabatanTujuan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanTujuan' => 'IdNamaJabatan']],
            [['IdLokasi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefLokasi::className(), 'targetAttribute' => ['IdLokasi' => 'IdLokasi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPromosiMutasiDetail' => 'Id Usulan Promosi Mutasi Detail',
            'IdUsulanPromosiMutasi' => 'Id Usulan Promosi Mutasi',
            'IdPegawai' => 'Id Pegawai',
            'IdSatkerAsal' => 'Id Satker Asal',
            'IdUnitKerjaAsal' => 'Id Unit Kerja Asal',
            'IdLokasi' => 'Id Lokasi',
            'IdJabatanAsal' => 'Id Jabatan Asal',
            'IdSatkerTujuan' => 'Id Satker Tujuan',
            'IdUnitKerjaTujuan' => 'Id Unit Kerja Tujuan',
            'IdJabatanTujuan' => 'Id Jabatan Tujuan',
            'StatusUsulan' => 'Status Usulan',
            'UsulanbiayaMutasi' => 'Usulanbiaya Mutasi',
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
    public function getSatkerAsal()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerAsal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerTujuan()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerTujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerjaAsal()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaAsal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerjaTujuan()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaTujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsulanPromosiMutasi()
    {
        return $this->hasOne(TransUsulanPromosiMutasi::className(), ['IdUsulanPromosiMutasi' => 'IdUsulanPromosiMutasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanAsal()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanAsal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanTujuan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanTujuan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokasi()
    {
        return $this->hasOne(TrefLokasi::className(), ['IdLokasi' => 'IdLokasi']);
    }
}
