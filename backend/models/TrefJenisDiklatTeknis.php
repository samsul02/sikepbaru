<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_diklat_teknis".
 *
 * @property int $IdJenisDiklat
 * @property int $IdDiklatKelompok
 * @property int $IdDiklatSektor
 * @property string $NamaJenisDiklatTeknis
 *
 * @property TransRiwayatDiklatTeknis[] $transRiwayatDiklatTeknis
 * @property TrefDiklatKelompok $diklatKelompok
 * @property TrefDiklatSektor $diklatSektor
 */
class TrefJenisDiklatTeknis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_diklat_teknis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdDiklatKelompok', 'IdDiklatSektor', 'NamaJenisDiklatTeknis'], 'required'],
            [['IdDiklatKelompok', 'IdDiklatSektor'], 'integer'],
            [['NamaJenisDiklatTeknis'], 'string', 'max' => 200],
            [['IdDiklatKelompok'], 'exist', 'skipOnError' => true, 'targetClass' => TrefDiklatKelompok::className(), 'targetAttribute' => ['IdDiklatKelompok' => 'IdKelompokDiklat']],
            [['IdDiklatSektor'], 'exist', 'skipOnError' => true, 'targetClass' => TrefDiklatSektor::className(), 'targetAttribute' => ['IdDiklatSektor' => 'IdDiklatSektor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisDiklat' => 'Id Jenis Diklat',
            'IdDiklatKelompok' => 'Id Diklat Kelompok',
            'IdDiklatSektor' => 'Id Diklat Sektor',
            'NamaJenisDiklatTeknis' => 'Nama Jenis Diklat Teknis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatTeknis()
    {
        return $this->hasMany(TransRiwayatDiklatTeknis::className(), ['IdJenisDiklatTeknis' => 'IdJenisDiklat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiklatKelompok()
    {
        return $this->hasOne(TrefDiklatKelompok::className(), ['IdKelompokDiklat' => 'IdDiklatKelompok']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiklatSektor()
    {
        return $this->hasOne(TrefDiklatSektor::className(), ['IdDiklatSektor' => 'IdDiklatSektor']);
    }
}
