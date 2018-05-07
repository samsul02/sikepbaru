<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_diklat_teknis".
 *
 * @property int $IdRiwayatDiklatTeknis
 * @property int $IdPegawai
 * @property int $IdJenisDiklatTeknis
 * @property int $IdNegara
 * @property int $LamaDiklatTeknis
 * @property string $PenyelenggaraDiklatTeknis
 * @property string $NomorSertifikatDiklatTeknis
 * @property string $TanggalSertifikatDiklatTeknis
 * @property string $PejabatSertifikatDiklatTeknis
 * @property string $DokumenSertifikatDiklatTeknis
 *
 * @property TmstPegawai $pegawai
 * @property TrefJenisDiklatTeknis $jenisDiklatTeknis
 * @property TrefNegara $negara
 */
class TransRiwayatDiklatTeknis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_diklat_teknis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdJenisDiklatTeknis', 'LamaDiklatTeknis'], 'required'],
            [['IdPegawai', 'IdJenisDiklatTeknis', 'IdNegara', 'LamaDiklatTeknis'], 'integer'],
            [['TanggalSertifikatDiklatTeknis'], 'safe'],
            [['PenyelenggaraDiklatTeknis'], 'string', 'max' => 200],
            [['NomorSertifikatDiklatTeknis', 'PejabatSertifikatDiklatTeknis', 'DokumenSertifikatDiklatTeknis'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdJenisDiklatTeknis'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisDiklatTeknis::className(), 'targetAttribute' => ['IdJenisDiklatTeknis' => 'IdJenisDiklat']],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatDiklatTeknis' => 'Id Riwayat Diklat Teknis',
            'IdPegawai' => 'Id Pegawai',
            'IdJenisDiklatTeknis' => 'Id Jenis Diklat Teknis',
            'IdNegara' => 'Id Negara',
            'LamaDiklatTeknis' => 'Lama Diklat Teknis',
            'PenyelenggaraDiklatTeknis' => 'Penyelenggara Diklat Teknis',
            'NomorSertifikatDiklatTeknis' => 'Nomor Sertifikat Diklat Teknis',
            'TanggalSertifikatDiklatTeknis' => 'Tanggal Sertifikat Diklat Teknis',
            'PejabatSertifikatDiklatTeknis' => 'Pejabat Sertifikat Diklat Teknis',
            'DokumenSertifikatDiklatTeknis' => 'Dokumen Sertifikat Diklat Teknis',
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
    public function getJenisDiklatTeknis()
    {
        return $this->hasOne(TrefJenisDiklatTeknis::className(), ['IdJenisDiklat' => 'IdJenisDiklatTeknis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegara()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'IdNegara']);
    }
}
