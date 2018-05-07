<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_seminar".
 *
 * @property int $IdRiwayatSeminar
 * @property int $IdPegawai
 * @property int $IdJenisSeminar
 * @property string $NamaSeminar
 * @property string $LokasiSeminar
 * @property int $IdNegaraSeminar
 * @property int $IdStatusPembiayaan
 * @property int $IdStatusKedudukan
 * @property string $PeriodeSeminar
 * @property string $PenyelenggaraSeminar
 * @property string $DokumenSeminar
 *
 * @property TmstPegawai $pegawai
 * @property TrefJenisSeminar $jenisSeminar
 * @property TrefNegara $negaraSeminar
 * @property TrefSeminarJenisPembiayaan $statusPembiayaan
 * @property TrefSeminarPosisi $statusKedudukan
 */
class TransRiwayatSeminar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_seminar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdJenisSeminar', 'IdNegaraSeminar', 'IdStatusPembiayaan', 'IdStatusKedudukan'], 'integer'],
            [['NamaSeminar'], 'string', 'max' => 250],
            [['LokasiSeminar'], 'string', 'max' => 100],
            [['PeriodeSeminar'], 'string', 'max' => 7],
            [['PenyelenggaraSeminar'], 'string', 'max' => 200],
            [['DokumenSeminar'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdJenisSeminar'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisSeminar::className(), 'targetAttribute' => ['IdJenisSeminar' => 'IdJenisSeminar']],
            [['IdNegaraSeminar'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegaraSeminar' => 'IdNegara']],
            [['IdStatusPembiayaan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefSeminarJenisPembiayaan::className(), 'targetAttribute' => ['IdStatusPembiayaan' => 'IdJenisPembiayaanSeminar']],
            [['IdStatusKedudukan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefSeminarPosisi::className(), 'targetAttribute' => ['IdStatusKedudukan' => 'IdSeminarPosisi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatSeminar' => 'Id Riwayat Seminar',
            'IdPegawai' => 'Id Pegawai',
            'IdJenisSeminar' => 'Id Jenis Seminar',
            'NamaSeminar' => 'Nama Seminar',
            'LokasiSeminar' => 'Lokasi Seminar',
            'IdNegaraSeminar' => 'Id Negara Seminar',
            'IdStatusPembiayaan' => 'Id Status Pembiayaan',
            'IdStatusKedudukan' => 'Id Status Kedudukan',
            'PeriodeSeminar' => 'Periode Seminar',
            'PenyelenggaraSeminar' => 'Penyelenggara Seminar',
            'DokumenSeminar' => 'Dokumen Seminar',
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
    public function getJenisSeminar()
    {
        return $this->hasOne(TrefJenisSeminar::className(), ['IdJenisSeminar' => 'IdJenisSeminar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegaraSeminar()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'IdNegaraSeminar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPembiayaan()
    {
        return $this->hasOne(TrefSeminarJenisPembiayaan::className(), ['IdJenisPembiayaanSeminar' => 'IdStatusPembiayaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusKedudukan()
    {
        return $this->hasOne(TrefSeminarPosisi::className(), ['IdSeminarPosisi' => 'IdStatusKedudukan']);
    }
}
