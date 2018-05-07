<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_pensiun".
 *
 * @property int $IdPensiun
 * @property int $IdPegawai
 * @property string $DokumenSKPensiun
 * @property string $NomorSKPensiun
 * @property string $TanggalSKPensiun
 * @property string $TMTPensiun
 * @property int $PejabatPembuatSKPensiun
 * @property int $IdAlasanPensiun
 * @property string $CatatanAlasanPensiun
 * @property int $JenisPensiun
 *
 * @property TmstPegawai $pegawai
 * @property TrefAlasanPensiun $alasanPensiun
 * @property TrefJenisPensiun $jenisPensiun
 */
class TransPensiun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_pensiun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdAlasanPensiun', 'JenisPensiun'], 'required'],
            [['IdPegawai', 'PejabatPembuatSKPensiun', 'IdAlasanPensiun', 'JenisPensiun'], 'integer'],
            [['TanggalSKPensiun', 'TMTPensiun'], 'safe'],
            [['CatatanAlasanPensiun'], 'string'],
            [['DokumenSKPensiun', 'NomorSKPensiun'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdAlasanPensiun'], 'exist', 'skipOnError' => true, 'targetClass' => TrefAlasanPensiun::className(), 'targetAttribute' => ['IdAlasanPensiun' => 'IdAlasanPensiun']],
            [['JenisPensiun'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisPensiun::className(), 'targetAttribute' => ['JenisPensiun' => 'idJenisPensiun']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPensiun' => 'Id Pensiun',
            'IdPegawai' => 'Id Pegawai',
            'DokumenSKPensiun' => 'Dokumen Skpensiun',
            'NomorSKPensiun' => 'Nomor Skpensiun',
            'TanggalSKPensiun' => 'Tanggal Skpensiun',
            'TMTPensiun' => 'Tmtpensiun',
            'PejabatPembuatSKPensiun' => 'Pejabat Pembuat Skpensiun',
            'IdAlasanPensiun' => 'Id Alasan Pensiun',
            'CatatanAlasanPensiun' => 'Catatan Alasan Pensiun',
            'JenisPensiun' => 'Jenis Pensiun',
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
    public function getAlasanPensiun()
    {
        return $this->hasOne(TrefAlasanPensiun::className(), ['IdAlasanPensiun' => 'IdAlasanPensiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPensiun()
    {
        return $this->hasOne(TrefJenisPensiun::className(), ['idJenisPensiun' => 'JenisPensiun']);
    }
}
