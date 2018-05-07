<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_pak_jabatan_fungsional".
 *
 * @property int $IdUsulanPAKJabFung
 * @property int $IdPegawai
 * @property string $TanggalUsulan
 * @property string $NomorPAK
 * @property int $IdRefJabFung
 * @property int $AngkaKredit
 *
 * @property TmstPegawai $pegawai
 */
class TransUsulanPakJabatanFungsional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_pak_jabatan_fungsional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TanggalUsulan', 'NomorPAK', 'IdRefJabFung', 'AngkaKredit'], 'required'],
            [['IdPegawai', 'IdRefJabFung', 'AngkaKredit'], 'integer'],
            [['TanggalUsulan'], 'safe'],
            [['NomorPAK'], 'string', 'max' => 30],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPAKJabFung' => 'Id Usulan Pakjab Fung',
            'IdPegawai' => 'Id Pegawai',
            'TanggalUsulan' => 'Tanggal Usulan',
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
