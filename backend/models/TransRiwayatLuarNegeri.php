<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_luar_negeri".
 *
 * @property int $IdRiwayatLuarNegeri
 * @property int $IdPegawai
 * @property int $IdNegara
 * @property string $TujuanKunjungan
 * @property int $IdStatusPembiayaan
 * @property string $Sponsor
 * @property string $TanggalKunjungan
 * @property int $LamaKunjungan
 *
 * @property TmstPegawai $pegawai
 * @property TrefNegara $negara
 * @property TrefSeminarJenisPembiayaan $statusPembiayaan
 */
class TransRiwayatLuarNegeri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_luar_negeri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdNegara', 'TujuanKunjungan'], 'required'],
            [['IdPegawai', 'IdNegara', 'IdStatusPembiayaan', 'LamaKunjungan'], 'integer'],
            [['TanggalKunjungan'], 'safe'],
            [['TujuanKunjungan'], 'string', 'max' => 250],
            [['Sponsor'], 'string', 'max' => 100],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
            [['IdStatusPembiayaan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefSeminarJenisPembiayaan::className(), 'targetAttribute' => ['IdStatusPembiayaan' => 'IdJenisPembiayaanSeminar']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatLuarNegeri' => 'Id Riwayat Luar Negeri',
            'IdPegawai' => 'Id Pegawai',
            'IdNegara' => 'Id Negara',
            'TujuanKunjungan' => 'Tujuan Kunjungan',
            'IdStatusPembiayaan' => 'Id Status Pembiayaan',
            'Sponsor' => 'Sponsor',
            'TanggalKunjungan' => 'Tanggal Kunjungan',
            'LamaKunjungan' => 'Lama Kunjungan',
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
    public function getNegara()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'IdNegara']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusPembiayaan()
    {
        return $this->hasOne(TrefSeminarJenisPembiayaan::className(), ['IdJenisPembiayaanSeminar' => 'IdStatusPembiayaan']);
    }
}
