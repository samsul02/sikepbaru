<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_prestasi".
 *
 * @property int $IdRiwayatPrestasi
 * @property int $IdPegawai
 * @property string $TahunPrestasi
 * @property string $NamaPrestasi
 * @property string $TingkatPrestasi
 * @property string $Dokumen
 *
 * @property TmstPegawai $pegawai
 */
class TransRiwayatPrestasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_prestasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TahunPrestasi', 'NamaPrestasi'], 'required'],
            [['IdPegawai'], 'integer'],
            [['TahunPrestasi'], 'safe'],
            [['NamaPrestasi', 'Dokumen'], 'string', 'max' => 100],
            [['TingkatPrestasi'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPrestasi' => 'Id Riwayat Prestasi',
            'IdPegawai' => 'Id Pegawai',
            'TahunPrestasi' => 'Tahun Prestasi',
            'NamaPrestasi' => 'Nama Prestasi',
            'TingkatPrestasi' => 'Tingkat Prestasi',
            'Dokumen' => 'Dokumen',
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
