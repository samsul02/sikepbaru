<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_pendidikan".
 *
 * @property int $IdRiwayatPendidikan
 * @property int $IdPegawai
 * @property int $IdTingkatPendidikan
 * @property int $IdNegara
 * @property int $IdUniversitas
 * @property int $IdJurusan
 * @property string $NamaInstansiPendidikan
 * @property string $TahunLulus
 * @property string $NomorIjazah
 * @property string $Tanggaljazah
 * @property string $DokumenIjazah
 * @property string $NamaRektorKepalaInstansi
 * @property string $FlagFormatBKN
 *
 * @property TmstPegawai $pegawai
 * @property TrefTingkatPendidikan $tingkatPendidikan
 * @property TrefNegara $negara
 * @property TrefUniversitas $universitas
 * @property TrefJurusan $jurusan
 */
class TransRiwayatPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdTingkatPendidikan', 'IdNegara', 'NamaInstansiPendidikan', 'TahunLulus'], 'required'],
            [['IdPegawai', 'IdTingkatPendidikan', 'IdNegara', 'IdUniversitas', 'IdJurusan'], 'integer'],
            [['TahunLulus', 'Tanggaljazah'], 'safe'],
            [['FlagFormatBKN'], 'string'],
            [['NamaInstansiPendidikan'], 'string', 'max' => 200],
            [['NomorIjazah', 'DokumenIjazah'], 'string', 'max' => 100],
            [['NamaRektorKepalaInstansi'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdTingkatPendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
            [['IdUniversitas'], 'exist', 'skipOnError' => true, 'targetClass' => TrefUniversitas::className(), 'targetAttribute' => ['IdUniversitas' => 'IdUniversitas']],
            [['IdJurusan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJurusan::className(), 'targetAttribute' => ['IdJurusan' => 'IdJurusan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPendidikan' => 'Id Riwayat Pendidikan',
            'IdPegawai' => 'Id Pegawai',
            'IdTingkatPendidikan' => 'Id Tingkat Pendidikan',
            'IdNegara' => 'Id Negara',
            'IdUniversitas' => 'Id Universitas',
            'IdJurusan' => 'Id Jurusan',
            'NamaInstansiPendidikan' => 'Nama Instansi Pendidikan',
            'TahunLulus' => 'Tahun Lulus',
            'NomorIjazah' => 'Nomor Ijazah',
            'Tanggaljazah' => 'Tanggaljazah',
            'DokumenIjazah' => 'Dokumen Ijazah',
            'NamaRektorKepalaInstansi' => 'Nama Rektor Kepala Instansi',
            'FlagFormatBKN' => 'Flag Format Bkn',
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
    public function getTingkatPendidikan()
    {
        return $this->hasOne(TrefTingkatPendidikan::className(), ['IdRefTingkatPendidikan' => 'IdTingkatPendidikan']);
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
    public function getUniversitas()
    {
        return $this->hasOne(TrefUniversitas::className(), ['IdUniversitas' => 'IdUniversitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(TrefJurusan::className(), ['IdJurusan' => 'IdJurusan']);
    }
}
