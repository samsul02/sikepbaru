<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_peserta_diklat".
 *
 * @property int $IdUsulanPesertaDiklat
 * @property int $IdNamaKegiatanDiklat
 * @property int $IdSatkerPegawai
 * @property string $StatusUsulan
 *
 * @property TmstSatker $satkerPegawai
 */
class TransUsulanPesertaDiklat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_peserta_diklat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdNamaKegiatanDiklat', 'IdSatkerPegawai', 'StatusUsulan'], 'required'],
            [['IdNamaKegiatanDiklat', 'IdSatkerPegawai'], 'integer'],
            [['StatusUsulan'], 'string', 'max' => 5],
            [['IdSatkerPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerPegawai' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPesertaDiklat' => 'Id Usulan Peserta Diklat',
            'IdNamaKegiatanDiklat' => 'Id Nama Kegiatan Diklat',
            'IdSatkerPegawai' => 'Id Satker Pegawai',
            'StatusUsulan' => 'Status Usulan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerPegawai()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerPegawai']);
    }
}
