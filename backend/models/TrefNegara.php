<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_negara".
 *
 * @property int $IdNegara
 * @property string $KodeNegara
 * @property string $NamaNegara
 *
 * @property TransKegiatanDiklat[] $transKegiatanDiklat
 * @property TransRiwayatDiklatPrajabatan[] $transRiwayatDiklatPrajabatan
 * @property TransRiwayatDiklatTeknis[] $transRiwayatDiklatTeknis
 * @property TransRiwayatLuarNegeri[] $transRiwayatLuarNegeri
 * @property TransRiwayatPendidikan[] $transRiwayatPendidikan
 * @property TransRiwayatPenghargaan[] $transRiwayatPenghargaan
 * @property TransRiwayatSeminar[] $transRiwayatSeminar
 * @property TransRiwayatTugasBelajar[] $transRiwayatTugasBelajar
 * @property TrefUniversitas[] $trefUniversitas
 */
class TrefNegara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_negara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KodeNegara', 'NamaNegara'], 'required'],
            [['KodeNegara'], 'string', 'max' => 4],
            [['NamaNegara'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdNegara' => 'Id Negara',
            'KodeNegara' => 'Kode Negara',
            'NamaNegara' => 'Nama Negara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransKegiatanDiklat()
    {
        return $this->hasMany(TransKegiatanDiklat::className(), ['NegaraKegiatanDiklat' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatPrajabatan()
    {
        return $this->hasMany(TransRiwayatDiklatPrajabatan::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatTeknis()
    {
        return $this->hasMany(TransRiwayatDiklatTeknis::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatLuarNegeri()
    {
        return $this->hasMany(TransRiwayatLuarNegeri::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPendidikan()
    {
        return $this->hasMany(TransRiwayatPendidikan::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPenghargaan()
    {
        return $this->hasMany(TransRiwayatPenghargaan::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSeminar()
    {
        return $this->hasMany(TransRiwayatSeminar::className(), ['IdNegaraSeminar' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatTugasBelajar()
    {
        return $this->hasMany(TransRiwayatTugasBelajar::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefUniversitas()
    {
        return $this->hasMany(TrefUniversitas::className(), ['IdNegara' => 'IdNegara']);
    }
}
