<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_riwayat_klas_pengadilan".
 *
 * @property int $IdRiwayatKlasPengadilan
 * @property int $IdSatker
 * @property int $IdKlasPengadilanLama
 * @property int $IdKlasPengadilanBaru
 * @property string $TanggalKlasPengadilanBaru
 * @property string $NomorSuratPenetapanKlasPengadilanBaru
 * @property string $TMTKlasPengadilanBaru
 * @property string $SuratPenetapanKlasPengadilanBaru
 *
 * @property TmstSatker $satker
 * @property TmstSatker $klasPengadilanLama
 * @property TmstSatker $klasPengadilanBaru
 */
class TransRiwayatKlasPengadilan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_riwayat_klas_pengadilan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdSatker', 'IdKlasPengadilanLama', 'IdKlasPengadilanBaru', 'TanggalKlasPengadilanBaru', 'NomorSuratPenetapanKlasPengadilanBaru', 'TMTKlasPengadilanBaru', 'SuratPenetapanKlasPengadilanBaru'], 'required'],
            [['IdSatker', 'IdKlasPengadilanLama', 'IdKlasPengadilanBaru'], 'integer'],
            [['TanggalKlasPengadilanBaru', 'TMTKlasPengadilanBaru'], 'safe'],
            [['SuratPenetapanKlasPengadilanBaru'], 'string'],
            [['NomorSuratPenetapanKlasPengadilanBaru'], 'string', 'max' => 20],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
            [['IdKlasPengadilanLama'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdKlasPengadilanLama' => 'IdSatker']],
            [['IdKlasPengadilanBaru'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdKlasPengadilanBaru' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRiwayatKlasPengadilan' => 'Id Riwayat Klas Pengadilan',
            'IdSatker' => 'Id Satker',
            'IdKlasPengadilanLama' => 'Id Klas Pengadilan Lama',
            'IdKlasPengadilanBaru' => 'Id Klas Pengadilan Baru',
            'TanggalKlasPengadilanBaru' => 'Tanggal Klas Pengadilan Baru',
            'NomorSuratPenetapanKlasPengadilanBaru' => 'Nomor Surat Penetapan Klas Pengadilan Baru',
            'TMTKlasPengadilanBaru' => 'Tmtklas Pengadilan Baru',
            'SuratPenetapanKlasPengadilanBaru' => 'Surat Penetapan Klas Pengadilan Baru',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlasPengadilanLama()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdKlasPengadilanLama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKlasPengadilanBaru()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdKlasPengadilanBaru']);
    }
}
