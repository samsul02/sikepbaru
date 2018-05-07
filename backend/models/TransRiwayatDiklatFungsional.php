<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_diklat_fungsional".
 *
 * @property int $IdRiwayatDiklatFungsional
 * @property int $IdPegawai
 * @property int $IdDiklatFungsionalJenis
 * @property int $IdFungsionalPerjenjangan
 * @property int $IdFungsionalKelompok
 * @property int $LamaDiklatFungsional
 * @property string $PenyelenggaraDiklatFungsional
 * @property string $NomorSertifikatDiklatFungsional
 * @property string $TanggalSertifikatDiklatFungsional
 * @property string $PejabatSertifikatDiklatFungsional
 * @property string $DokumenSertifikatDiklatFungsional
 *
 * @property TmstPegawai $pegawai
 * @property TrefDiklatFungsional $diklatFungsionalJenis
 * @property TrefFungsionalPerjenjangan $fungsionalPerjenjangan
 * @property TrefFungsionalKelompok $fungsionalKelompok
 */
class TransRiwayatDiklatFungsional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_diklat_fungsional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdDiklatFungsionalJenis'], 'required'],
            [['IdPegawai', 'IdDiklatFungsionalJenis', 'IdFungsionalPerjenjangan', 'IdFungsionalKelompok', 'LamaDiklatFungsional'], 'integer'],
            [['TanggalSertifikatDiklatFungsional'], 'safe'],
            [['PenyelenggaraDiklatFungsional'], 'string', 'max' => 200],
            [['NomorSertifikatDiklatFungsional', 'PejabatSertifikatDiklatFungsional', 'DokumenSertifikatDiklatFungsional'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdDiklatFungsionalJenis'], 'exist', 'skipOnError' => true, 'targetClass' => TrefDiklatFungsional::className(), 'targetAttribute' => ['IdDiklatFungsionalJenis' => 'IdJenisDiklatFungsional']],
            [['IdFungsionalPerjenjangan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefFungsionalPerjenjangan::className(), 'targetAttribute' => ['IdFungsionalPerjenjangan' => 'IdRefFungsionalPerjenjangan']],
            [['IdFungsionalKelompok'], 'exist', 'skipOnError' => true, 'targetClass' => TrefFungsionalKelompok::className(), 'targetAttribute' => ['IdFungsionalKelompok' => 'IdFungsionalKelompok']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatDiklatFungsional' => 'Id Riwayat Diklat Fungsional',
            'IdPegawai' => 'Id Pegawai',
            'IdDiklatFungsionalJenis' => 'Id Diklat Fungsional Jenis',
            'IdFungsionalPerjenjangan' => 'Id Fungsional Perjenjangan',
            'IdFungsionalKelompok' => 'Id Fungsional Kelompok',
            'LamaDiklatFungsional' => 'Lama Diklat Fungsional',
            'PenyelenggaraDiklatFungsional' => 'Penyelenggara Diklat Fungsional',
            'NomorSertifikatDiklatFungsional' => 'Nomor Sertifikat Diklat Fungsional',
            'TanggalSertifikatDiklatFungsional' => 'Tanggal Sertifikat Diklat Fungsional',
            'PejabatSertifikatDiklatFungsional' => 'Pejabat Sertifikat Diklat Fungsional',
            'DokumenSertifikatDiklatFungsional' => 'Dokumen Sertifikat Diklat Fungsional',
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
    public function getDiklatFungsionalJenis()
    {
        return $this->hasOne(TrefDiklatFungsional::className(), ['IdJenisDiklatFungsional' => 'IdDiklatFungsionalJenis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFungsionalPerjenjangan()
    {
        return $this->hasOne(TrefFungsionalPerjenjangan::className(), ['IdRefFungsionalPerjenjangan' => 'IdFungsionalPerjenjangan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFungsionalKelompok()
    {
        return $this->hasOne(TrefFungsionalKelompok::className(), ['IdFungsionalKelompok' => 'IdFungsionalKelompok']);
    }
}
