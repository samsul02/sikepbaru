<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_dp3".
 *
 * @property int $IdRiwayatDP3
 * @property int $IdPegawai
 * @property string $TahunDP3
 * @property int $IdPejabatPenilai
 * @property int $IdAtasanPejabatPenilai
 * @property int $NilaiDP3
 * @property string $DokumenHasilPenilaian
 *
 * @property TmstPegawai $pegawai
 * @property TmstPegawai $pejabatPenilai
 * @property TmstPegawai $atasanPejabatPenilai
 */
class TransRiwayatDp3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_dp3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TahunDP3', 'IdPejabatPenilai', 'NilaiDP3', 'DokumenHasilPenilaian'], 'required'],
            [['IdPegawai', 'IdPejabatPenilai', 'IdAtasanPejabatPenilai', 'NilaiDP3'], 'integer'],
            [['TahunDP3'], 'safe'],
            [['DokumenHasilPenilaian'], 'string', 'max' => 200],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdPejabatPenilai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPejabatPenilai' => 'IdPegawai']],
            [['IdAtasanPejabatPenilai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdAtasanPejabatPenilai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatDP3' => 'Id Riwayat Dp3',
            'IdPegawai' => 'Id Pegawai',
            'TahunDP3' => 'Tahun Dp3',
            'IdPejabatPenilai' => 'Id Pejabat Penilai',
            'IdAtasanPejabatPenilai' => 'Id Atasan Pejabat Penilai',
            'NilaiDP3' => 'Nilai Dp3',
            'DokumenHasilPenilaian' => 'Dokumen Hasil Penilaian',
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
    public function getPejabatPenilai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPejabatPenilai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtasanPejabatPenilai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdAtasanPejabatPenilai']);
    }
}
