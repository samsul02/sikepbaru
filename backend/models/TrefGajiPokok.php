<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_gaji_pokok".
 *
 * @property int $IdGajiPokok
 * @property string $Tahun
 * @property int $IdGolonganRuang
 * @property string $Golongan
 * @property int $MasaKerja
 * @property int $GajiPokok
 *
 * @property TransRiwayatInpassing[] $transRiwayatInpassing
 * @property TransRiwayatInpassing[] $transRiwayatInpassing0
 * @property TransRiwayatKgb[] $transRiwayatKgb
 * @property TrefGolonganRuang $golonganRuang
 * @property TrefGajiTunjangan[] $trefGajiTunjangan
 */
class TrefGajiPokok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_gaji_pokok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tahun', 'IdGolonganRuang', 'Golongan', 'MasaKerja', 'GajiPokok'], 'required'],
            [['Tahun'], 'safe'],
            [['IdGolonganRuang', 'MasaKerja', 'GajiPokok'], 'integer'],
            [['Golongan'], 'string', 'max' => 25],
            [['IdGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganRuang' => 'IdGolonganRuang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdGajiPokok' => 'Id Gaji Pokok',
            'Tahun' => 'Tahun',
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'Golongan' => 'Golongan',
            'MasaKerja' => 'Masa Kerja',
            'GajiPokok' => 'Gaji Pokok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatInpassing()
    {
        return $this->hasMany(TransRiwayatInpassing::className(), ['BesaranGajiLama' => 'IdGajiPokok']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatInpassing0()
    {
        return $this->hasMany(TransRiwayatInpassing::className(), ['BesaranGajiBaru' => 'IdGajiPokok']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKgb()
    {
        return $this->hasMany(TransRiwayatKgb::className(), ['IdGajiPokok' => 'IdGajiPokok']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolonganRuang()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefGajiTunjangan()
    {
        return $this->hasMany(TrefGajiTunjangan::className(), ['IdGajiPokok' => 'IdGajiPokok']);
    }
}
