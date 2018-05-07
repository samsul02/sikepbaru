<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_kabupaten".
 *
 * @property int $IdKabupaten
 * @property string $NamaKabupaten
 * @property string $KodeKabupaten
 * @property int $IdPropinsi
 *
 * @property TmstAlamatPegawai[] $tmstAlamatPegawai
 * @property TmstPegawai[] $tmstPegawai
 * @property TmstSatker[] $tmstSatker
 * @property TransKegiatanDiklat[] $transKegiatanDiklat
 * @property TrefPropinsi $propinsi
 */
class TrefKabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaKabupaten', 'KodeKabupaten'], 'required'],
            [['IdPropinsi'], 'integer'],
            [['NamaKabupaten'], 'string', 'max' => 50],
            [['KodeKabupaten'], 'string', 'max' => 4],
            [['IdPropinsi'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPropinsi::className(), 'targetAttribute' => ['IdPropinsi' => 'IdPropinsi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKabupaten' => 'Id Kabupaten',
            'NamaKabupaten' => 'Nama Kabupaten',
            'KodeKabupaten' => 'Kode Kabupaten',
            'IdPropinsi' => 'Id Propinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstAlamatPegawai()
    {
        return $this->hasMany(TmstAlamatPegawai::className(), ['KodeKabupatenTempatTinggal' => 'IdKabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['KabupatenTempatLahir' => 'IdKabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstSatker()
    {
        return $this->hasMany(TmstSatker::className(), ['IdKabupatenSatker' => 'IdKabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransKegiatanDiklat()
    {
        return $this->hasMany(TransKegiatanDiklat::className(), ['KotaKegiatanDiklat' => 'IdKabupaten']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsi()
    {
        return $this->hasOne(TrefPropinsi::className(), ['IdPropinsi' => 'IdPropinsi']);
    }
}
