<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_pegawai_jabatan_tambahan".
 *
 * @property int $IdRefPegawaiJabatanTambahan
 * @property int $IdPegawai
 * @property int $IdPegawaiJabatan
 * @property int $IdNamaJabatan
 * @property int $IdUnitKerjaTambahan
 * @property string $NamaJabatanTambahan
 * @property string $TmtJabatanStart
 * @property string $TmtJabatanEnd
 * @property string $NomorSkJabatanTambahan
 * @property string $TanggalSkJabatanTambahan
 * @property string $PejabatSkJabatanTambahan
 * @property string $TanggalPelantikanJabatanTambahan
 * @property string $DokumenSkJabatanTambahan
 * @property string $NomorSpmj
 * @property string $TanggalSpmj
 * @property string $PejabatSpmj
 * @property string $DokumenSpmj
 *
 * @property TmstPegawai $pegawai
 * @property TmstUnitKerja $unitKerjaTambahan
 * @property TrefJabatan $namaJabatan
 */
class TransPegawaiJabatanTambahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_pegawai_jabatan_tambahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdPegawaiJabatan', 'IdNamaJabatan', 'IdUnitKerjaTambahan', 'TmtJabatanStart'], 'required'],
            [['IdPegawai', 'IdPegawaiJabatan', 'IdNamaJabatan', 'IdUnitKerjaTambahan'], 'integer'],
            [['TmtJabatanStart', 'TmtJabatanEnd', 'TanggalSkJabatanTambahan', 'TanggalPelantikanJabatanTambahan', 'TanggalSpmj'], 'safe'],
            [['NamaJabatanTambahan'], 'string', 'max' => 100],
            [['NomorSkJabatanTambahan', 'PejabatSkJabatanTambahan', 'DokumenSkJabatanTambahan', 'NomorSpmj', 'PejabatSpmj', 'DokumenSpmj'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdUnitKerjaTambahan'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerjaTambahan' => 'IdUnitKerja']],
            [['IdNamaJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdNamaJabatan' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefPegawaiJabatanTambahan' => 'Id Ref Pegawai Jabatan Tambahan',
            'IdPegawai' => 'Id Pegawai',
            'IdPegawaiJabatan' => 'Id Pegawai Jabatan',
            'IdNamaJabatan' => 'Id Nama Jabatan',
            'IdUnitKerjaTambahan' => 'Id Unit Kerja Tambahan',
            'NamaJabatanTambahan' => 'Nama Jabatan Tambahan',
            'TmtJabatanStart' => 'Tmt Jabatan Start',
            'TmtJabatanEnd' => 'Tmt Jabatan End',
            'NomorSkJabatanTambahan' => 'Nomor Sk Jabatan Tambahan',
            'TanggalSkJabatanTambahan' => 'Tanggal Sk Jabatan Tambahan',
            'PejabatSkJabatanTambahan' => 'Pejabat Sk Jabatan Tambahan',
            'TanggalPelantikanJabatanTambahan' => 'Tanggal Pelantikan Jabatan Tambahan',
            'DokumenSkJabatanTambahan' => 'Dokumen Sk Jabatan Tambahan',
            'NomorSpmj' => 'Nomor Spmj',
            'TanggalSpmj' => 'Tanggal Spmj',
            'PejabatSpmj' => 'Pejabat Spmj',
            'DokumenSpmj' => 'Dokumen Spmj',
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
    public function getUnitKerjaTambahan()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerjaTambahan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamaJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdNamaJabatan']);
    }
}
