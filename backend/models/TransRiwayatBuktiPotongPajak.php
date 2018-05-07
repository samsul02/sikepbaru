<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_bukti_potong_pajak".
 *
 * @property int $IdRiwayatBuktiPotongPajak
 * @property int $IdPegawai
 * @property string $Tahun
 * @property string $DokumenBuktiPotongPajak
 * @property string $JenisDokumenBuktiPotongPajak
 * @property string $Keterangan
 *
 * @property TmstPegawai $pegawai
 */
class TransRiwayatBuktiPotongPajak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_bukti_potong_pajak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'Tahun', 'DokumenBuktiPotongPajak'], 'required'],
            [['IdPegawai'], 'integer'],
            [['Tahun', 'JenisDokumenBuktiPotongPajak'], 'string', 'max' => 50],
            [['DokumenBuktiPotongPajak'], 'string', 'max' => 100],
            [['Keterangan'], 'string', 'max' => 255],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatBuktiPotongPajak' => 'Id Riwayat Bukti Potong Pajak',
            'IdPegawai' => 'Id Pegawai',
            'Tahun' => 'Tahun',
            'DokumenBuktiPotongPajak' => 'Dokumen Bukti Potong Pajak',
            'JenisDokumenBuktiPotongPajak' => 'Jenis Dokumen Bukti Potong Pajak',
            'Keterangan' => 'Keterangan',
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
