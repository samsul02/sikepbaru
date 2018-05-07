<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_sanksi".
 *
 * @property int $IdRiwayatSanksi
 * @property int $IdPegawai
 * @property int $StatusProsesBawas
 * @property int $IdJenisHukumanDisiplin
 * @property string $SanksiText
 * @property string $AlasanSanksi
 * @property string $TMTMulaiHukuman
 * @property string $TMTAkhirHukuman
 * @property string $NomorSKSanksi
 * @property string $TanggalSKSanksi
 * @property string $PejabatPembuatSKSanksi
 * @property string $DokumenSKSanksi
 * @property string $KeteranganMasalah
 * @property string $PenangananHukuman
 * @property string $PenangananAdministrasiHukuman
 * @property string $StatusHukumanSelesai
 * @property string $NoDokumenBAP
 * @property string $TglDokumenBAP
 * @property string $DokumenBAP
 * @property string $NoDokumenIjinTugas
 * @property string $TglDokumenIjinTugas
 * @property string $DokumenIjinTugas
 * @property int $IdJenisHukumanDisiplinBanding
 * @property string $SanksiTextBanding
 * @property string $AlasanSanksiBanding
 * @property string $TMTMulaiHukumanBanding
 * @property string $TMTAkhirHukumanBanding
 * @property string $NoSKHasilBanding
 * @property string $TglSKHasilBanding
 * @property string $PejabatPembuatSKHasilBanding
 * @property string $DokumenSKHasilBanding
 *
 * @property TmstPegawai $pegawai
 * @property TrefHukumanDisiplin $jenisHukumanDisiplin
 * @property TrefStatusProsesBawas $statusProsesBawas
 */
class TransRiwayatSanksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_sanksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'StatusProsesBawas', 'SanksiText', 'AlasanSanksi', 'TMTMulaiHukuman', 'TMTAkhirHukuman', 'NomorSKSanksi', 'TanggalSKSanksi', 'PejabatPembuatSKSanksi', 'DokumenSKSanksi', 'KeteranganMasalah', 'PenangananHukuman', 'PenangananAdministrasiHukuman', 'StatusHukumanSelesai', 'NoDokumenBAP', 'TglDokumenBAP', 'DokumenBAP'], 'required'],
            [['IdPegawai', 'StatusProsesBawas', 'IdJenisHukumanDisiplin', 'IdJenisHukumanDisiplinBanding'], 'integer'],
            [['AlasanSanksi', 'AlasanSanksiBanding'], 'string'],
            [['TMTMulaiHukuman', 'TMTAkhirHukuman', 'TanggalSKSanksi', 'TglDokumenBAP', 'TglDokumenIjinTugas', 'TMTMulaiHukumanBanding', 'TMTAkhirHukumanBanding', 'TglSKHasilBanding'], 'safe'],
            [['SanksiText', 'NomorSKSanksi', 'DokumenSKSanksi', 'KeteranganMasalah', 'PenangananHukuman', 'PenangananAdministrasiHukuman', 'NoDokumenBAP', 'DokumenBAP', 'NoDokumenIjinTugas', 'DokumenIjinTugas', 'SanksiTextBanding', 'NoSKHasilBanding', 'DokumenSKHasilBanding'], 'string', 'max' => 100],
            [['PejabatPembuatSKSanksi', 'PejabatPembuatSKHasilBanding'], 'string', 'max' => 50],
            [['StatusHukumanSelesai'], 'string', 'max' => 1],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdJenisHukumanDisiplin'], 'exist', 'skipOnError' => true, 'targetClass' => TrefHukumanDisiplin::className(), 'targetAttribute' => ['IdJenisHukumanDisiplin' => 'IdHukumanDisiplin']],
            [['StatusProsesBawas'], 'exist', 'skipOnError' => true, 'targetClass' => TrefStatusProsesBawas::className(), 'targetAttribute' => ['StatusProsesBawas' => 'IdProsesBawas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatSanksi' => 'Id Riwayat Sanksi',
            'IdPegawai' => 'Id Pegawai',
            'StatusProsesBawas' => 'Status Proses Bawas',
            'IdJenisHukumanDisiplin' => 'Id Jenis Hukuman Disiplin',
            'SanksiText' => 'Sanksi Text',
            'AlasanSanksi' => 'Alasan Sanksi',
            'TMTMulaiHukuman' => 'Tmtmulai Hukuman',
            'TMTAkhirHukuman' => 'Tmtakhir Hukuman',
            'NomorSKSanksi' => 'Nomor Sksanksi',
            'TanggalSKSanksi' => 'Tanggal Sksanksi',
            'PejabatPembuatSKSanksi' => 'Pejabat Pembuat Sksanksi',
            'DokumenSKSanksi' => 'Dokumen Sksanksi',
            'KeteranganMasalah' => 'Keterangan Masalah',
            'PenangananHukuman' => 'Penanganan Hukuman',
            'PenangananAdministrasiHukuman' => 'Penanganan Administrasi Hukuman',
            'StatusHukumanSelesai' => 'Status Hukuman Selesai',
            'NoDokumenBAP' => 'No Dokumen Bap',
            'TglDokumenBAP' => 'Tgl Dokumen Bap',
            'DokumenBAP' => 'Dokumen Bap',
            'NoDokumenIjinTugas' => 'No Dokumen Ijin Tugas',
            'TglDokumenIjinTugas' => 'Tgl Dokumen Ijin Tugas',
            'DokumenIjinTugas' => 'Dokumen Ijin Tugas',
            'IdJenisHukumanDisiplinBanding' => 'Id Jenis Hukuman Disiplin Banding',
            'SanksiTextBanding' => 'Sanksi Text Banding',
            'AlasanSanksiBanding' => 'Alasan Sanksi Banding',
            'TMTMulaiHukumanBanding' => 'Tmtmulai Hukuman Banding',
            'TMTAkhirHukumanBanding' => 'Tmtakhir Hukuman Banding',
            'NoSKHasilBanding' => 'No Skhasil Banding',
            'TglSKHasilBanding' => 'Tgl Skhasil Banding',
            'PejabatPembuatSKHasilBanding' => 'Pejabat Pembuat Skhasil Banding',
            'DokumenSKHasilBanding' => 'Dokumen Skhasil Banding',
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
    public function getJenisHukumanDisiplin()
    {
        return $this->hasOne(TrefHukumanDisiplin::className(), ['IdHukumanDisiplin' => 'IdJenisHukumanDisiplin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusProsesBawas()
    {
        return $this->hasOne(TrefStatusProsesBawas::className(), ['IdProsesBawas' => 'StatusProsesBawas']);
    }
}
