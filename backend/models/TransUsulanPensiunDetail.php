<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_pensiun_detail".
 *
 * @property int $IdUsulanPensiun
 * @property int $IdPegawai
 * @property int $IdJabatanPegawi
 * @property int $IdUnitKerjaPegawai
 * @property string $DokumenSKPensiun
 * @property string $NomorSKPensiun
 * @property string $TanggalSKPensiun
 * @property string $TMTPensiun
 * @property int $PejabatPembuatSKPensiun
 * @property int $AlasanPensiun
 * @property string $CatatanAlasanPensiun
 * @property string $NoPerpeg
 * @property string $TanggalPerpeg
 *
 * @property TmstPegawai $pegawai
 * @property TrefJabatan $jabatanPegawi
 * @property TmstUnitKerja $unitKerjaPegawai
 * @property TmstPegawai $pejabatPembuatSKPensiun
 * @property TrefAlasanPensiun $alasanPensiun
 */
class TransUsulanPensiunDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_pensiun_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdJabatanPegawi', 'IdUnitKerjaPegawai', 'AlasanPensiun', 'NoPerpeg', 'TanggalPerpeg'], 'required'],
            [['IdPegawai', 'IdJabatanPegawi', 'IdUnitKerjaPegawai', 'PejabatPembuatSKPensiun', 'AlasanPensiun'], 'integer'],
            [['TanggalSKPensiun', 'TMTPensiun', 'TanggalPerpeg'], 'safe'],
            [['CatatanAlasanPensiun'], 'string'],
            [['DokumenSKPensiun', 'NomorSKPensiun', 'NoPerpeg'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdJabatanPegawi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanPegawi' => 'IdNamaJabatan']],
            [['IdUnitKerjaPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaPegawai' => 'IdUnitKerja']],
            [['PejabatPembuatSKPensiun'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['PejabatPembuatSKPensiun' => 'IdPegawai']],
            [['AlasanPensiun'], 'exist', 'skipOnError' => true, 'targetClass' => TrefAlasanPensiun::className(), 'targetAttribute' => ['AlasanPensiun' => 'IdAlasanPensiun']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPensiun' => 'Id Usulan Pensiun',
            'IdPegawai' => 'Id Pegawai',
            'IdJabatanPegawi' => 'Id Jabatan Pegawi',
            'IdUnitKerjaPegawai' => 'Id Unit Kerja Pegawai',
            'DokumenSKPensiun' => 'Dokumen Skpensiun',
            'NomorSKPensiun' => 'Nomor Skpensiun',
            'TanggalSKPensiun' => 'Tanggal Skpensiun',
            'TMTPensiun' => 'Tmtpensiun',
            'PejabatPembuatSKPensiun' => 'Pejabat Pembuat Skpensiun',
            'AlasanPensiun' => 'Alasan Pensiun',
            'CatatanAlasanPensiun' => 'Catatan Alasan Pensiun',
            'NoPerpeg' => 'No Perpeg',
            'TanggalPerpeg' => 'Tanggal Perpeg',
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
    public function getJabatanPegawi()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanPegawi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerjaPegawai()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPejabatPembuatSKPensiun()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'PejabatPembuatSKPensiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlasanPensiun()
    {
        return $this->hasOne(TrefAlasanPensiun::className(), ['IdAlasanPensiun' => 'AlasanPensiun']);
    }
}
