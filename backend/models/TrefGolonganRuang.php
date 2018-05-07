<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_golongan_ruang".
 *
 * @property int $IdGolonganRuang
 * @property int $UrutanGolonganRuang
 * @property string $KodeGolonganRuang
 * @property string $NamaGolongan
 * @property string $Golongan
 * @property string $Ruang
 * @property string $JenisAngkatanMiliter
 * @property string $JenjangMiliter
 * @property int $IdJenisPegawai
 * @property int $IdFormatBKN
 * @property int $IdTingkatPendidikanMinimal
 *
 * @property TmstPegawai[] $tmstPegawai
 * @property TransAngkaKredit[] $transAngkaKredit
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransRiwayatKgb[] $transRiwayatKgb
 * @property TransRiwayatPangkat[] $transRiwayatPangkat
 * @property TransUsulanKpDetail[] $transUsulanKpDetail
 * @property TransUsulanKpDetail[] $transUsulanKpDetail0
 * @property TransUsulanKpoDetail[] $transUsulanKpoDetail
 * @property TransUsulanKpoDetail[] $transUsulanKpoDetail0
 * @property TrefGajiPokok[] $trefGajiPokok
 * @property TrefTingkatPendidikan $tingkatPendidikanMinimal
 * @property TrefJenisPegawai $jenisPegawai
 */
class TrefGolonganRuang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_golongan_ruang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UrutanGolonganRuang', 'KodeGolonganRuang', 'NamaGolongan', 'Golongan', 'Ruang'], 'required'],
            [['UrutanGolonganRuang', 'IdJenisPegawai', 'IdFormatBKN', 'IdTingkatPendidikanMinimal'], 'integer'],
            [['KodeGolonganRuang', 'NamaGolongan'], 'string', 'max' => 50],
            [['Golongan', 'Ruang'], 'string', 'max' => 15],
            [['JenisAngkatanMiliter', 'JenjangMiliter'], 'string', 'max' => 30],
            [['IdTingkatPendidikanMinimal'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikanMinimal' => 'IdRefTingkatPendidikan']],
            [['IdJenisPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisPegawai::className(), 'targetAttribute' => ['IdJenisPegawai' => 'IdJenisPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'UrutanGolonganRuang' => 'Urutan Golongan Ruang',
            'KodeGolonganRuang' => 'Kode Golongan Ruang',
            'NamaGolongan' => 'Nama Golongan',
            'Golongan' => 'Golongan',
            'Ruang' => 'Ruang',
            'JenisAngkatanMiliter' => 'Jenis Angkatan Militer',
            'JenjangMiliter' => 'Jenjang Militer',
            'IdJenisPegawai' => 'Id Jenis Pegawai',
            'IdFormatBKN' => 'Id Format Bkn',
            'IdTingkatPendidikanMinimal' => 'Id Tingkat Pendidikan Minimal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['KodeGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAngkaKredit()
    {
        return $this->hasMany(TransAngkaKredit::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKgb()
    {
        return $this->hasMany(TransRiwayatKgb::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPangkat()
    {
        return $this->hasMany(TransRiwayatPangkat::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpDetail()
    {
        return $this->hasMany(TransUsulanKpDetail::className(), ['IdGolonganSaatIni' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpDetail0()
    {
        return $this->hasMany(TransUsulanKpDetail::className(), ['IdGolonganUsulan' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpoDetail()
    {
        return $this->hasMany(TransUsulanKpoDetail::className(), ['IdGolonganUsulan' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpoDetail0()
    {
        return $this->hasMany(TransUsulanKpoDetail::className(), ['IdGolonganSaatIni' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefGajiPokok()
    {
        return $this->hasMany(TrefGajiPokok::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
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
    public function getJenisPegawai()
    {
        return $this->hasOne(TrefJenisPegawai::className(), ['IdJenisPegawai' => 'IdJenisPegawai']);
    }
}
