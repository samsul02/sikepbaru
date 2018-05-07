<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_ujian_dinas".
 *
 * @property int $IdRiwayatUjianDinas
 * @property int $idPegawai
 * @property string $TahunUjianDinas
 * @property int $NilaiUjianDinas
 * @property int $JenisUjian
 * @property string $NomorSertifikatUjian
 * @property string $TanggalSertifikatUjian
 * @property string $DokumenSertifikatUjian
 *
 * @property TmstPegawai $pegawai
 * @property TrefJenisUjianDinas $jenisUjian
 */
class TransRiwayatUjianDinas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_ujian_dinas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPegawai', 'TahunUjianDinas', 'NilaiUjianDinas', 'JenisUjian'], 'required'],
            [['idPegawai', 'NilaiUjianDinas', 'JenisUjian'], 'integer'],
            [['TahunUjianDinas', 'TanggalSertifikatUjian'], 'safe'],
            [['NomorSertifikatUjian'], 'string', 'max' => 100],
            [['DokumenSertifikatUjian'], 'string', 'max' => 50],
            [['idPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['idPegawai' => 'IdPegawai']],
            [['JenisUjian'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisUjianDinas::className(), 'targetAttribute' => ['JenisUjian' => 'IdJenisUjian']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatUjianDinas' => 'Id Riwayat Ujian Dinas',
            'idPegawai' => 'Id Pegawai',
            'TahunUjianDinas' => 'Tahun Ujian Dinas',
            'NilaiUjianDinas' => 'Nilai Ujian Dinas',
            'JenisUjian' => 'Jenis Ujian',
            'NomorSertifikatUjian' => 'Nomor Sertifikat Ujian',
            'TanggalSertifikatUjian' => 'Tanggal Sertifikat Ujian',
            'DokumenSertifikatUjian' => 'Dokumen Sertifikat Ujian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'idPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisUjian()
    {
        return $this->hasOne(TrefJenisUjianDinas::className(), ['IdJenisUjian' => 'JenisUjian']);
    }
}
