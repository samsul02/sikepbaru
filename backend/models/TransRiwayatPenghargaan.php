<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_penghargaan".
 *
 * @property int $IdRiwayatPenghargaan
 * @property int $IdPegawai
 * @property int $IdJenisPenghargaan
 * @property string $NamaPenghargaan
 * @property string $Tahun
 * @property int $IdNegara
 * @property string $InstansiPenghargaan
 * @property string $DokumenPenghargaan
 * @property string $NomorSKPenghargaan
 * @property string $TanggalSKPenghargaan
 * @property int $NomorUrutPenghargaan
 *
 * @property TmstPegawai $pegawai
 * @property TrefTandaJasa $jenisPenghargaan
 * @property TrefNegara $negara
 */
class TransRiwayatPenghargaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_penghargaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdJenisPenghargaan', 'InstansiPenghargaan'], 'required'],
            [['IdPegawai', 'IdJenisPenghargaan', 'IdNegara', 'NomorUrutPenghargaan'], 'integer'],
            [['Tahun', 'TanggalSKPenghargaan'], 'safe'],
            [['NamaPenghargaan', 'DokumenPenghargaan', 'NomorSKPenghargaan'], 'string', 'max' => 100],
            [['InstansiPenghargaan'], 'string', 'max' => 200],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdJenisPenghargaan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTandaJasa::className(), 'targetAttribute' => ['IdJenisPenghargaan' => 'IdTandaJasa']],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPenghargaan' => 'Id Riwayat Penghargaan',
            'IdPegawai' => 'Id Pegawai',
            'IdJenisPenghargaan' => 'Id Jenis Penghargaan',
            'NamaPenghargaan' => 'Nama Penghargaan',
            'Tahun' => 'Tahun',
            'IdNegara' => 'Id Negara',
            'InstansiPenghargaan' => 'Instansi Penghargaan',
            'DokumenPenghargaan' => 'Dokumen Penghargaan',
            'NomorSKPenghargaan' => 'Nomor Skpenghargaan',
            'TanggalSKPenghargaan' => 'Tanggal Skpenghargaan',
            'NomorUrutPenghargaan' => 'Nomor Urut Penghargaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPenghargaan()
    {
        return $this->hasOne(TrefTandaJasa::className(), ['IdTandaJasa' => 'IdJenisPenghargaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegara()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'IdNegara']);
    }
}
