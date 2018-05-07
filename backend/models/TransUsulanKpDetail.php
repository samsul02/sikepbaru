<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_kp_detail".
 *
 * @property int $IdUsulanKPDetil
 * @property int $IdUsulanKP
 * @property int $IdPegawai
 * @property int $IdTingkatPendidikan
 * @property int $IdGolonganSaatIni
 * @property int $IdGolonganUsulan
 * @property int $IdProses
 * @property int $IdKPPN
 * @property string $JeniUsulanLP
 * @property int $MasaKerjaGolonganBulan
 * @property int $MasaKerjaGolonganTahun
 * @property string $NomorPersetujuanBKN
 * @property string $TanggalPersetujuanBKN
 * @property string $TMT_KP
 * @property string $TanggalSKUsulanKP
 * @property string $NomorSKUsulanKP
 * @property string $PejabatSKUsulanKP
 * @property double $GajiPokok
 * @property string $DokumenSK
 * @property string $StatusUsulan
 *
 * @property TmstPegawai $pegawai
 * @property TransUsulanKp $usulanKP
 * @property TrefGolonganRuang $golonganSaatIni
 * @property TrefGolonganRuang $golonganUsulan
 * @property TrefKppn $kPPN
 * @property TrefTingkatPendidikan $tingkatPendidikan
 */
class TransUsulanKpDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_kp_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanKP', 'IdPegawai', 'IdTingkatPendidikan', 'IdGolonganSaatIni', 'IdGolonganUsulan', 'IdProses', 'IdKPPN'], 'required'],
            [['IdUsulanKP', 'IdPegawai', 'IdTingkatPendidikan', 'IdGolonganSaatIni', 'IdGolonganUsulan', 'IdProses', 'IdKPPN', 'MasaKerjaGolonganBulan', 'MasaKerjaGolonganTahun'], 'integer'],
            [['TanggalPersetujuanBKN', 'TMT_KP', 'TanggalSKUsulanKP'], 'safe'],
            [['GajiPokok'], 'number'],
            [['JeniUsulanLP', 'StatusUsulan'], 'string', 'max' => 1],
            [['NomorPersetujuanBKN'], 'string', 'max' => 30],
            [['NomorSKUsulanKP'], 'string', 'max' => 100],
            [['PejabatSKUsulanKP', 'DokumenSK'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdUsulanKP'], 'exist', 'skipOnError' => true, 'targetClass' => TransUsulanKp::className(), 'targetAttribute' => ['IdUsulanKP' => 'IdUsulanKP']],
            [['IdGolonganSaatIni'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganSaatIni' => 'IdGolonganRuang']],
            [['IdGolonganUsulan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganUsulan' => 'IdGolonganRuang']],
            [['IdKPPN'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKppn::className(), 'targetAttribute' => ['IdKPPN' => 'IdKPPN']],
            [['IdTingkatPendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTingkatPendidikan::className(), 'targetAttribute' => ['IdTingkatPendidikan' => 'IdRefTingkatPendidikan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanKPDetil' => 'Id Usulan Kpdetil',
            'IdUsulanKP' => 'Id Usulan Kp',
            'IdPegawai' => 'Id Pegawai',
            'IdTingkatPendidikan' => 'Id Tingkat Pendidikan',
            'IdGolonganSaatIni' => 'Id Golongan Saat Ini',
            'IdGolonganUsulan' => 'Id Golongan Usulan',
            'IdProses' => 'Id Proses',
            'IdKPPN' => 'Id Kppn',
            'JeniUsulanLP' => 'Jeni Usulan Lp',
            'MasaKerjaGolonganBulan' => 'Masa Kerja Golongan Bulan',
            'MasaKerjaGolonganTahun' => 'Masa Kerja Golongan Tahun',
            'NomorPersetujuanBKN' => 'Nomor Persetujuan Bkn',
            'TanggalPersetujuanBKN' => 'Tanggal Persetujuan Bkn',
            'TMT_KP' => 'Tmt  Kp',
            'TanggalSKUsulanKP' => 'Tanggal Skusulan Kp',
            'NomorSKUsulanKP' => 'Nomor Skusulan Kp',
            'PejabatSKUsulanKP' => 'Pejabat Skusulan Kp',
            'GajiPokok' => 'Gaji Pokok',
            'DokumenSK' => 'Dokumen Sk',
            'StatusUsulan' => 'Status Usulan',
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
    public function getUsulanKP()
    {
        return $this->hasOne(TransUsulanKp::className(), ['IdUsulanKP' => 'IdUsulanKP']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolonganSaatIni()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganSaatIni']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolonganUsulan()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganUsulan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKPPN()
    {
        return $this->hasOne(TrefKppn::className(), ['IdKPPN' => 'IdKPPN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkatPendidikan()
    {
        return $this->hasOne(TrefTingkatPendidikan::className(), ['IdRefTingkatPendidikan' => 'IdTingkatPendidikan']);
    }
}
