<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_pak_jabatan_fungsional".
 *
 * @property int $IdRiwayatPAKJabFung
 * @property int $IdPegawai
 * @property string $Tanggal
 * @property string $NomorPAK
 * @property int $IdRefJabFung
 * @property int $AngkaKredit
 *
 * @property TmstPegawai $pegawai
 */
class TransRiwayatPakJabatanFungsional extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trans_riwayat_pak_jabatan_fungsional';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'Tanggal', 'NomorPAK', 'IdRefJabFung', 'AngkaKredit'], 'required'],
            [['IdPegawai', 'IdRefJabFung', 'AngkaKredit'], 'integer'],
            [['Tanggal'], 'safe'],
            [['NomorPAK'], 'string', 'max' => 30],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPAKJabFung' => 'Id Riwayat Pakjab Fung',
            'IdPegawai' => 'Id Pegawai',
            'Tanggal' => 'Tanggal',
            'NomorPAK' => 'Nomor Pak',
            'IdRefJabFung' => 'Id Ref Jab Fung',
            'AngkaKredit' => 'Angka Kredit',
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
