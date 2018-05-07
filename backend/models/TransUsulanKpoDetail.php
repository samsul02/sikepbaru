<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_kpo_detail".
 *
 * @property int $IdUsulanKPODetil
 * @property int $IdUsulanKPO
 * @property int $IdPegawai
 * @property int $IdTingkatPendidikan
 * @property int $IdGolonganSaatIni
 * @property int $IdGolonganUsulan
 * @property int $IdProses
 * @property int $IdKPPN
 * @property string $JeniUsulanKPO
 * @property int $MasaKerjaGolonganBulan
 * @property int $MasaKerjaGolonganTahun
 * @property string $NomorPersetujuanBKN
 * @property string $TanggalPersetujuanBKN
 * @property string $TmtKPO
 * @property string $TanggalSKUsulanKPO
 * @property string $NomorSKUsulanKPO
 * @property string $PejabatSKUsulanKPO
 * @property double $GajiPokok
 * @property string $DokumenSK
 * @property string $StatusUsulan
 *
 * @property TmstPegawai $pegawai
 * @property TransUsulanKpo $usulanKPO
 * @property TrefGolonganRuang $golonganUsulan
 * @property TrefGolonganRuang $golonganSaatIni
 * @property TrefKppn $kPPN
 * @property TrefTingkatPendidikan $tingkatPendidikan
 */
class TransUsulanKpoDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_kpo_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdUsulanKPO', 'IdPegawai', 'IdTingkatPendidikan', 'IdGolonganSaatIni', 'IdGolonganUsulan', 'IdProses', 'IdKPPN'], 'required'],
            [['IdUsulanKPO', 'IdPegawai', 'IdTingkatPendidikan', 'IdGolonganSaatIni', 'IdGolonganUsulan', 'IdProses', 'IdKPPN', 'MasaKerjaGolonganBulan', 'MasaKerjaGolonganTahun'], 'integer'],
            [['TanggalPersetujuanBKN', 'TmtKPO', 'TanggalSKUsulanKPO'], 'safe'],
            [['GajiPokok'], 'number'],
            [['JeniUsulanKPO', 'StatusUsulan'], 'string', 'max' => 1],
            [['NomorPersetujuanBKN'], 'string', 'max' => 30],
            [['NomorSKUsulanKPO'], 'string', 'max' => 100],
            [['PejabatSKUsulanKPO', 'DokumenSK'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdUsulanKPO'], 'exist', 'skipOnError' => true, 'targetClass' => TransUsulanKpo::className(), 'targetAttribute' => ['IdUsulanKPO' => 'IdUsulanKPO']],
            [['IdGolonganUsulan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganUsulan' => 'IdGolonganRuang']],
            [['IdGolonganSaatIni'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganSaatIni' => 'IdGolonganRuang']],
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
            'IdUsulanKPODetil' => 'Id Usulan Kpodetil',
            'IdUsulanKPO' => 'Id Usulan Kpo',
            'IdPegawai' => 'Id Pegawai',
            'IdTingkatPendidikan' => 'Id Tingkat Pendidikan',
            'IdGolonganSaatIni' => 'Id Golongan Saat Ini',
            'IdGolonganUsulan' => 'Id Golongan Usulan',
            'IdProses' => 'Id Proses',
            'IdKPPN' => 'Id Kppn',
            'JeniUsulanKPO' => 'Jeni Usulan Kpo',
            'MasaKerjaGolonganBulan' => 'Masa Kerja Golongan Bulan',
            'MasaKerjaGolonganTahun' => 'Masa Kerja Golongan Tahun',
            'NomorPersetujuanBKN' => 'Nomor Persetujuan Bkn',
            'TanggalPersetujuanBKN' => 'Tanggal Persetujuan Bkn',
            'TmtKPO' => 'Tmt Kpo',
            'TanggalSKUsulanKPO' => 'Tanggal Skusulan Kpo',
            'NomorSKUsulanKPO' => 'Nomor Skusulan Kpo',
            'PejabatSKUsulanKPO' => 'Pejabat Skusulan Kpo',
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
    public function getUsulanKPO()
    {
        return $this->hasOne(TransUsulanKpo::className(), ['IdUsulanKPO' => 'IdUsulanKPO']);
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
    public function getGolonganSaatIni()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganSaatIni']);
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
