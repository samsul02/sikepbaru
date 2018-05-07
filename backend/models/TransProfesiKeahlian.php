<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_profesi_keahlian".
 *
 * @property int $IdRiwayatProfesi
 * @property int $IdPegawai
 * @property string $Profesi
 * @property string $NamaInstansiProfesi
 *
 * @property TmstPegawai $pegawai
 */
class TransProfesiKeahlian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_profesi_keahlian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'Profesi', 'NamaInstansiProfesi'], 'required'],
            [['IdPegawai'], 'integer'],
            [['Profesi'], 'string', 'max' => 200],
            [['NamaInstansiProfesi'], 'string', 'max' => 1],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatProfesi' => 'Id Riwayat Profesi',
            'IdPegawai' => 'Id Pegawai',
            'Profesi' => 'Profesi',
            'NamaInstansiProfesi' => 'Nama Instansi Profesi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }
}
