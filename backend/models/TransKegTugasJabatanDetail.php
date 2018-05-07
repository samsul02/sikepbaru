<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_keg_tugas_jabatan_detail".
 *
 * @property int $IdKegiatanTugasJabatan
 * @property int $IdSKPDetil
 * @property string $KegiatanTugasJabatan
 * @property int $TargetAngkaKredit
 * @property int $RealisasiAngkaKredit
 * @property int $TargetOutput
 * @property string $RealisasiOutput
 * @property string $TargetMutu
 * @property string $RealisasiMutu
 * @property int $TargetWaktu
 * @property string $RealisasiWaktu
 * @property double $TargetBiaya
 * @property string $RealisasiBiaya
 *
 * @property TransSkpDetail $sKPDetil
 */
class TransKegTugasJabatanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_keg_tugas_jabatan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdSKPDetil', 'TargetAngkaKredit', 'RealisasiAngkaKredit', 'TargetOutput', 'TargetWaktu'], 'integer'],
            [['KegiatanTugasJabatan', 'RealisasiOutput', 'TargetMutu', 'RealisasiWaktu', 'RealisasiBiaya'], 'required'],
            [['TargetBiaya'], 'number'],
            [['KegiatanTugasJabatan', 'RealisasiOutput', 'TargetMutu', 'RealisasiWaktu', 'RealisasiBiaya'], 'string', 'max' => 250],
            [['RealisasiMutu'], 'string', 'max' => 5],
            [['IdSKPDetil'], 'exist', 'skipOnError' => true, 'targetClass' => TransSkpDetail::className(), 'targetAttribute' => ['IdSKPDetil' => 'IdSKPDetil']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKegiatanTugasJabatan' => 'Id Kegiatan Tugas Jabatan',
            'IdSKPDetil' => 'Id Skpdetil',
            'KegiatanTugasJabatan' => 'Kegiatan Tugas Jabatan',
            'TargetAngkaKredit' => 'Target Angka Kredit',
            'RealisasiAngkaKredit' => 'Realisasi Angka Kredit',
            'TargetOutput' => 'Target Output',
            'RealisasiOutput' => 'Realisasi Output',
            'TargetMutu' => 'Target Mutu',
            'RealisasiMutu' => 'Realisasi Mutu',
            'TargetWaktu' => 'Target Waktu',
            'RealisasiWaktu' => 'Realisasi Waktu',
            'TargetBiaya' => 'Target Biaya',
            'RealisasiBiaya' => 'Realisasi Biaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSKPDetil()
    {
        return $this->hasOne(TransSkpDetail::className(), ['IdSKPDetil' => 'IdSKPDetil']);
    }
}
