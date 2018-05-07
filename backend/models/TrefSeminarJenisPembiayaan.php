<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_seminar_jenis_pembiayaan".
 *
 * @property int $IdJenisPembiayaanSeminar
 * @property string $KodeJenisPembiayaanSeminar
 * @property string $NamaJenisPembiayaanSeminar
 *
 * @property TransRiwayatLuarNegeri[] $transRiwayatLuarNegeri
 * @property TransRiwayatSeminar[] $transRiwayatSeminar
 */
class TrefSeminarJenisPembiayaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_seminar_jenis_pembiayaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KodeJenisPembiayaanSeminar'], 'required'],
            [['KodeJenisPembiayaanSeminar'], 'string', 'max' => 1],
            [['NamaJenisPembiayaanSeminar'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisPembiayaanSeminar' => 'Id Jenis Pembiayaan Seminar',
            'KodeJenisPembiayaanSeminar' => 'Kode Jenis Pembiayaan Seminar',
            'NamaJenisPembiayaanSeminar' => 'Nama Jenis Pembiayaan Seminar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatLuarNegeri()
    {
        return $this->hasMany(TransRiwayatLuarNegeri::className(), ['IdStatusPembiayaan' => 'IdJenisPembiayaanSeminar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSeminar()
    {
        return $this->hasMany(TransRiwayatSeminar::className(), ['IdStatusPembiayaan' => 'IdJenisPembiayaanSeminar']);
    }
}
