<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jurusan".
 *
 * @property int $IdJurusan
 * @property string $KodeJurusan
 * @property string $NamaJurusan
 * @property int $IdTingkatPendidikan
 *
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransRiwayatPendidikan[] $transRiwayatPendidikan
 * @property TransRiwayatTugasBelajar[] $transRiwayatTugasBelajar
 * @property TrefTingkatPendidikan $tingkatPendidikan
 */
class TrefJurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KodeJurusan'], 'required'],
            [['IdTingkatPendidikan'], 'integer'],
            [['KodeJurusan'], 'string', 'max' => 4],
            [['NamaJurusan'], 'string', 'max' => 100],
            [['IdTingkatPendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJurusan' => 'Id Jurusan',
            'KodeJurusan' => 'Kode Jurusan',
            'NamaJurusan' => 'Nama Jurusan',
            'IdTingkatPendidikan' => 'Id Tingkat Pendidikan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdJurusan' => 'IdJurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPendidikan()
    {
        return $this->hasMany(TransRiwayatPendidikan::className(), ['IdJurusan' => 'IdJurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatTugasBelajar()
    {
        return $this->hasMany(TransRiwayatTugasBelajar::className(), ['IdJurusan' => 'IdJurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkatPendidikan()
    {
        return $this->hasOne(TrefTingkatPendidikan::className(), ['IdRefTingkatPendidikan' => 'IdTingkatPendidikan']);
    }
}
