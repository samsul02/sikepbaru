<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_insentif".
 *
 * @property int $IdRiwayatInsentif
 * @property int $IdPegawai
 * @property string $TanggalInsetif
 * @property int $JumlahInsentif
 *
 * @property TmstPegawai $pegawai
 */
class TransInsentif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_insentif';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TanggalInsetif', 'JumlahInsentif'], 'required'],
            [['IdPegawai', 'JumlahInsentif'], 'integer'],
            [['TanggalInsetif'], 'safe'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatInsentif' => 'Id Riwayat Insentif',
            'IdPegawai' => 'Id Pegawai',
            'TanggalInsetif' => 'Tanggal Insetif',
            'JumlahInsentif' => 'Jumlah Insentif',
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
