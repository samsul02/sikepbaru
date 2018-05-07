<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_tingkat_pendidikan".
 *
 * @property int $IdRefTingkatPendidikan
 * @property int $UrutanTingkatPendidikan
 * @property string $KodeTingkatPendidikan
 * @property string $NamaTingkatPendidikan
 * @property string $DeskripsiTingkatPendidikan
 *
 * @property TmstKeluarga[] $tmstKeluarga
 * @property TransFormasiPegawaiDetail[] $transFormasiPegawaiDetail
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransRiwayatPendidikan[] $transRiwayatPendidikan
 * @property TransRiwayatTugasBelajar[] $transRiwayatTugasBelajar
 * @property TransUsulanKpDetail[] $transUsulanKpDetail
 * @property TransUsulanKpoDetail[] $transUsulanKpoDetail
 * @property TrefGolonganRuang[] $trefGolonganRuang
 * @property TrefJurusan[] $trefJurusan
 */
class TrefTingkatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_tingkat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UrutanTingkatPendidikan'], 'integer'],
            [['KodeTingkatPendidikan'], 'string', 'max' => 5],
            [['NamaTingkatPendidikan'], 'string', 'max' => 50],
            [['DeskripsiTingkatPendidikan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefTingkatPendidikan' => 'Id Ref Tingkat Pendidikan',
            'UrutanTingkatPendidikan' => 'Urutan Tingkat Pendidikan',
            'KodeTingkatPendidikan' => 'Kode Tingkat Pendidikan',
            'NamaTingkatPendidikan' => 'Nama Tingkat Pendidikan',
            'DeskripsiTingkatPendidikan' => 'Deskripsi Tingkat Pendidikan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKeluarga()
    {
        return $this->hasMany(TmstKeluarga::className(), ['PendidikanTerakhir' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransFormasiPegawaiDetail()
    {
        return $this->hasMany(TransFormasiPegawaiDetail::className(), ['IdTingkatPendidikanMinimal' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPendidikan()
    {
        return $this->hasMany(TransRiwayatPendidikan::className(), ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatTugasBelajar()
    {
        return $this->hasMany(TransRiwayatTugasBelajar::className(), ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpDetail()
    {
        return $this->hasMany(TransUsulanKpDetail::className(), ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpoDetail()
    {
        return $this->hasMany(TransUsulanKpoDetail::className(), ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefGolonganRuang()
    {
        return $this->hasMany(TrefGolonganRuang::className(), ['IdTingkatPendidikanMinimal' => 'IdRefTingkatPendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefJurusan()
    {
        return $this->hasMany(TrefJurusan::className(), ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']);
    }
}
