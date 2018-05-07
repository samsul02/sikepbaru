<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_penguasaan_bahasa".
 *
 * @property int $IdRiwayatPenguasaanBahasa
 * @property int $IdPegawai
 * @property string $Bahasa
 * @property int $TingkatKemahiran 1. Tingkat Dasar (Elementary)
 * @property string $NamaTesBahasa
 * @property string $NamaInstansiSertifkatBahasa
 * @property string $NilaiTesBahasa
 * @property string $TahunLulusTesBahasa
 * @property string $DokumenTesBahasa
 *
 * @property TmstPegawai $pegawai
 */
class TransPenguasaanBahasa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_penguasaan_bahasa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'Bahasa', 'TingkatKemahiran'], 'required'],
            [['IdPegawai', 'TingkatKemahiran'], 'integer'],
            [['TahunLulusTesBahasa'], 'safe'],
            [['Bahasa', 'NamaTesBahasa', 'NamaInstansiSertifkatBahasa'], 'string', 'max' => 200],
            [['NilaiTesBahasa'], 'string', 'max' => 5],
            [['DokumenTesBahasa'], 'string', 'max' => 100],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPenguasaanBahasa' => 'Id Riwayat Penguasaan Bahasa',
            'IdPegawai' => 'Id Pegawai',
            'Bahasa' => 'Bahasa',
            'TingkatKemahiran' => 'Tingkat Kemahiran',
            'NamaTesBahasa' => 'Nama Tes Bahasa',
            'NamaInstansiSertifkatBahasa' => 'Nama Instansi Sertifkat Bahasa',
            'NilaiTesBahasa' => 'Nilai Tes Bahasa',
            'TahunLulusTesBahasa' => 'Tahun Lulus Tes Bahasa',
            'DokumenTesBahasa' => 'Dokumen Tes Bahasa',
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
