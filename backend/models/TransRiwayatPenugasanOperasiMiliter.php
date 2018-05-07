<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_penugasan_operasi_militer".
 *
 * @property int $IdRiwayatPenugasanMiliter
 * @property int $IdPegawai
 * @property string $TMTMulaiPenugasan
 * @property string $TMTSelesaiPenugasan
 * @property string $LokasiPenempatan
 *
 * @property TmstPegawai $pegawai
 */
class TransRiwayatPenugasanOperasiMiliter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_penugasan_operasi_militer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TMTMulaiPenugasan', 'TMTSelesaiPenugasan', 'LokasiPenempatan'], 'required'],
            [['IdPegawai'], 'integer'],
            [['TMTMulaiPenugasan', 'TMTSelesaiPenugasan'], 'safe'],
            [['LokasiPenempatan'], 'string', 'max' => 255],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatPenugasanMiliter' => 'Id Riwayat Penugasan Militer',
            'IdPegawai' => 'Id Pegawai',
            'TMTMulaiPenugasan' => 'Tmtmulai Penugasan',
            'TMTSelesaiPenugasan' => 'Tmtselesai Penugasan',
            'LokasiPenempatan' => 'Lokasi Penempatan',
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
