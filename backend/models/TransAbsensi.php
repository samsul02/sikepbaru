<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_absensi".
 *
 * @property int $IdAbsensi
 * @property string $Tanggal
 * @property int $IdPegawai
 * @property string $WaktuDatang
 * @property string $WaktuPulang
 *
 * @property TmstPegawai $pegawai
 */
class TransAbsensi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_absensi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tanggal', 'IdPegawai'], 'required'],
            [['Tanggal', 'WaktuDatang', 'WaktuPulang'], 'safe'],
            [['IdPegawai'], 'integer'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAbsensi' => 'Id Absensi',
            'Tanggal' => 'Tanggal',
            'IdPegawai' => 'Id Pegawai',
            'WaktuDatang' => 'Waktu Datang',
            'WaktuPulang' => 'Waktu Pulang',
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
