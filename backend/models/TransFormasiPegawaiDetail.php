<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_formasi_pegawai_detail".
 *
 * @property int $IdFormasiPegawai
 * @property int $IdSatker
 * @property int $IdUnitKerja
 * @property int $IdJabatan
 * @property int $IdTingkatPendidikanMinimal
 * @property string $SyaratAdministrasi
 * @property int $JumlahKebutuhan
 * @property int $UsiaMinimal
 * @property int $UsiaMaksimal
 *
 * @property TmstUnitKerja $unitKerja
 * @property TrefJabatan $jabatan
 * @property TrefTingkatPendidikan $tingkatPendidikanMinimal
 * @property TmstSatker $satker
 */
class TransFormasiPegawaiDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_formasi_pegawai_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdSatker', 'IdUnitKerja', 'IdJabatan', 'IdTingkatPendidikanMinimal', 'SyaratAdministrasi', 'JumlahKebutuhan', 'UsiaMinimal', 'UsiaMaksimal'], 'required'],
            [['IdSatker', 'IdUnitKerja', 'IdJabatan', 'IdTingkatPendidikanMinimal', 'JumlahKebutuhan', 'UsiaMinimal', 'UsiaMaksimal'], 'integer'],
            [['SyaratAdministrasi'], 'string'],
            [['IdUnitKerja'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerja' => 'IdUnitKerja']],
            [['IdJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatan' => 'IdNamaJabatan']],
            [['IdTingkatPendidikanMinimal'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikanMinimal' => 'IdRefTingkatPendidikan']],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdFormasiPegawai' => 'Id Formasi Pegawai',
            'IdSatker' => 'Id Satker',
            'IdUnitKerja' => 'Id Unit Kerja',
            'IdJabatan' => 'Id Jabatan',
            'IdTingkatPendidikanMinimal' => 'Id Tingkat Pendidikan Minimal',
            'SyaratAdministrasi' => 'Syarat Administrasi',
            'JumlahKebutuhan' => 'Jumlah Kebutuhan',
            'UsiaMinimal' => 'Usia Minimal',
            'UsiaMaksimal' => 'Usia Maksimal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerja()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkatPendidikanMinimal()
    {
        return $this->hasOne(TrefTingkatPendidikan::className(), ['IdRefTingkatPendidikan' => 'IdTingkatPendidikanMinimal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatker']);
    }
}
