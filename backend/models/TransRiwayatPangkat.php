<?php

namespace backend\modelscurrent;

use Yii;

/**
 * This is the model class for table "trans_riwayat_pangkat".
 *
 * @property int $IdRiwayatPangkat
 * @property int $IdPegawai
 * @property int $IdGolonganRuang
 * @property string $TMTGolongan
 * @property int $IdJenisPangkat
 * @property string $NomorSKPangkat
 * @property string $TanggalSKPangkat
 * @property string $PejabatSKPangkat
 * @property string $DokumenSKPangkat
 * @property string $NomorPersetujuanTeknis
 * @property string $TanggalPersetujuanTeknis
 * @property double $GajiPokok
 * @property int $MasaKerjaBulan
 * @property int $MasaKerjaTahun
 *
 * @property TransPeninjauanMasaKerja[] $transPeninjauanMasaKerja
 * @property TmstPegawai $pegawai
 * @property TrefGolonganRuang $golonganRuang
 * @property TrefJenisPangkat $jenisPangkat
 * @property TransUsulanKgbDetail[] $transUsulanKgbDetail
 */
class TransRiwayatPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdGolonganRuang', 'TMTGolongan', 'IdJenisPangkat', 'NomorSKPangkat', 'TanggalSKPangkat', 'PejabatSKPangkat', 'DokumenSKPangkat', 'NomorPersetujuanTeknis', 'TanggalPersetujuanTeknis', 'MasaKerjaBulan', 'MasaKerjaTahun'], 'required'],
            [['IdPegawai', 'IdGolonganRuang', 'IdJenisPangkat', 'MasaKerjaBulan', 'MasaKerjaTahun'], 'integer'],
            [['TMTGolongan', 'TanggalSKPangkat', 'TanggalPersetujuanTeknis'], 'safe'],
            [['GajiPokok'], 'number'],
            [['NomorSKPangkat', 'DokumenSKPangkat', 'NomorPersetujuanTeknis'], 'string', 'max' => 50],
            [['PejabatSKPangkat'], 'string', 'max' => 100],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganRuang' => 'IdGolonganRuang']],
            [['IdJenisPangkat'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJenisPangkat::className(), 'targetAttribute' => ['IdJenisPangkat' => 'IdJenisPangkat']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPangkat' => 'Id Riwayat Pangkat',
            'IdPegawai' => 'Id Pegawai',
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'TMTGolongan' => 'Tmtgolongan',
            'IdJenisPangkat' => 'Id Jenis Pangkat',
            'NomorSKPangkat' => 'Nomor Skpangkat',
            'TanggalSKPangkat' => 'Tanggal Skpangkat',
            'PejabatSKPangkat' => 'Pejabat Skpangkat',
            'DokumenSKPangkat' => 'Dokumen Skpangkat',
            'NomorPersetujuanTeknis' => 'Nomor Persetujuan Teknis',
            'TanggalPersetujuanTeknis' => 'Tanggal Persetujuan Teknis',
            'GajiPokok' => 'Gaji Pokok',
            'MasaKerjaBulan' => 'Masa Kerja Bulan',
            'MasaKerjaTahun' => 'Masa Kerja Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPeninjauanMasaKerja()
    {
        return $this->hasMany(TransPeninjauanMasaKerja::className(), ['IdRiwayatPangkat' => 'IdRiwayatPangkat']);
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
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisPangkat()
    {
        return $this->hasOne(TrefJenisPangkat::className(), ['IdJenisPangkat' => 'IdJenisPangkat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKgbDetail()
    {
        return $this->hasMany(TransUsulanKgbDetail::className(), ['IdRiwayatPangkat' => 'IdRiwayatPangkat']);
    }
}
