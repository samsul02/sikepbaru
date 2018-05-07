<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_tugas_belajar".
 *
 * @property int $IdRiwayatTugasBelajar
 * @property int $IdPegawai
 * @property string $TipeTugasBelajar
 * @property int $IdTingkatPendidikan
 * @property int $IdNegara
 * @property int $IdUniversitas
 * @property int $IdJurusan
 * @property int $IdStatusTugasBelajar
 * @property string $NomorSKTugasBelajar
 * @property string $TanggalSKTugasBelajar
 * @property string $PejabatSKTugasBelajar
 * @property string $DokumenSKTugasBelajar
 * @property string $TanggalPengajuanTugasBelajar
 * @property string $TanggalMulaiTugasBelajar
 * @property string $TanggalBerakhirTugasBelajar
 *
 * @property TmstPegawai $pegawai
 * @property TrefTingkatPendidikan $tingkatPendidikan
 * @property TrefNegara $negara
 * @property TrefUniversitas $universitas
 * @property TrefJurusan $jurusan
 * @property TrefStatusTugasBelajar $statusTugasBelajar
 */
class TransRiwayatTugasBelajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_tugas_belajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdTingkatPendidikan', 'IdNegara', 'IdUniversitas', 'IdJurusan', 'IdStatusTugasBelajar'], 'integer'],
            [['TipeTugasBelajar'], 'string'],
            [['TanggalSKTugasBelajar', 'TanggalPengajuanTugasBelajar', 'TanggalMulaiTugasBelajar', 'TanggalBerakhirTugasBelajar'], 'safe'],
            [['NomorSKTugasBelajar'], 'string', 'max' => 100],
            [['PejabatSKTugasBelajar'], 'string', 'max' => 50],
            [['DokumenSKTugasBelajar'], 'string', 'max' => 255],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdTingkatPendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
            [['IdUniversitas'], 'exist', 'skipOnError' => true, 'targetClass' => TrefUniversitas::className(), 'targetAttribute' => ['IdUniversitas' => 'IdUniversitas']],
            [['IdJurusan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJurusan::className(), 'targetAttribute' => ['IdJurusan' => 'IdJurusan']],
            [['IdStatusTugasBelajar'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusTugasBelajar::className(), 'targetAttribute' => ['IdStatusTugasBelajar' => 'IdStatusTugasBelajar']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatTugasBelajar' => 'Id Riwayat Tugas Belajar',
            'IdPegawai' => 'Id Pegawai',
            'TipeTugasBelajar' => 'Tipe Tugas Belajar',
            'IdTingkatPendidikan' => 'Id Tingkat Pendidikan',
            'IdNegara' => 'Id Negara',
            'IdUniversitas' => 'Id Universitas',
            'IdJurusan' => 'Id Jurusan',
            'IdStatusTugasBelajar' => 'Id Status Tugas Belajar',
            'NomorSKTugasBelajar' => 'Nomor Sktugas Belajar',
            'TanggalSKTugasBelajar' => 'Tanggal Sktugas Belajar',
            'PejabatSKTugasBelajar' => 'Pejabat Sktugas Belajar',
            'DokumenSKTugasBelajar' => 'Dokumen Sktugas Belajar',
            'TanggalPengajuanTugasBelajar' => 'Tanggal Pengajuan Tugas Belajar',
            'TanggalMulaiTugasBelajar' => 'Tanggal Mulai Tugas Belajar',
            'TanggalBerakhirTugasBelajar' => 'Tanggal Berakhir Tugas Belajar',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusTugasBelajar()
    {
        return $this->hasOne(TrefStatusTugasBelajar::className(), ['IdStatusTugasBelajar' => 'IdStatusTugasBelajar']);
    }
}
