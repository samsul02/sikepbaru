<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_inpassing".
 *
 * @property int $IdRiwayatInpassing
 * @property int $IdPegawai
 * @property int $IdGolonganRuang
 * @property int $BesaranGajiLama
 * @property int $BesaranGajiBaru
 * @property string $PejabatPembuatSuratInpassing
 * @property string $NomorSuratInpassing
 * @property string $TanggalSuratInpassing
 * @property string $TMTInpassing
 * @property string $DokumenSuratInpassing
 *
 * @property TmstPegawai $pegawai
 * @property TmstPegawai $golonganRuang
 * @property TrefGajiPokok $besaranGajiLama
 * @property TrefGajiPokok $besaranGajiBaru
 */
class TransRiwayatInpassing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_inpassing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdGolonganRuang', 'BesaranGajiLama', 'BesaranGajiBaru'], 'required'],
            [['IdPegawai', 'IdGolonganRuang', 'BesaranGajiLama', 'BesaranGajiBaru'], 'integer'],
            [['TanggalSuratInpassing', 'TMTInpassing'], 'safe'],
            [['PejabatPembuatSuratInpassing', 'DokumenSuratInpassing'], 'string', 'max' => 100],
            [['NomorSuratInpassing'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdGolonganRuang' => 'IdPegawai']],
            [['BesaranGajiLama'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGajiPokok::className(), 'targetAttribute' => ['BesaranGajiLama' => 'IdGajiPokok']],
            [['BesaranGajiBaru'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGajiPokok::className(), 'targetAttribute' => ['BesaranGajiBaru' => 'IdGajiPokok']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatInpassing' => 'Id Riwayat Inpassing',
            'IdPegawai' => 'Id Pegawai',
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'BesaranGajiLama' => 'Besaran Gaji Lama',
            'BesaranGajiBaru' => 'Besaran Gaji Baru',
            'PejabatPembuatSuratInpassing' => 'Pejabat Pembuat Surat Inpassing',
            'NomorSuratInpassing' => 'Nomor Surat Inpassing',
            'TanggalSuratInpassing' => 'Tanggal Surat Inpassing',
            'TMTInpassing' => 'Tmtinpassing',
            'DokumenSuratInpassing' => 'Dokumen Surat Inpassing',
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
    public function getGolonganRuang()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBesaranGajiLama()
    {
        return $this->hasOne(TrefGajiPokok::className(), ['IdGajiPokok' => 'BesaranGajiLama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBesaranGajiBaru()
    {
        return $this->hasOne(TrefGajiPokok::className(), ['IdGajiPokok' => 'BesaranGajiBaru']);
    }
}
