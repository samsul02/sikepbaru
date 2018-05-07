<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_keanggotaan_parpol".
 *
 * @property int $IdRiwayatKeanggotaanParpol
 * @property int $IdPegawai
 * @property string $NamaParpol
 * @property string $TahunKeanggotaanMulai
 * @property string $TahunKeanggotaanAkhir
 *
 * @property TmstPegawai $pegawai
 */
class TransRiwayatKeanggotaanParpol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_keanggotaan_parpol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'NamaParpol', 'TahunKeanggotaanMulai'], 'required'],
            [['IdPegawai'], 'integer'],
            [['TahunKeanggotaanMulai', 'TahunKeanggotaanAkhir'], 'safe'],
            [['NamaParpol'], 'string', 'max' => 100],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatKeanggotaanParpol' => 'Id Riwayat Keanggotaan Parpol',
            'IdPegawai' => 'Id Pegawai',
            'NamaParpol' => 'Nama Parpol',
            'TahunKeanggotaanMulai' => 'Tahun Keanggotaan Mulai',
            'TahunKeanggotaanAkhir' => 'Tahun Keanggotaan Akhir',
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
