<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_biaya_transport_mutasi".
 *
 * @property int $IdBiayaTransport
 * @property int $KodeSatkerAsalMutasi
 * @property int $KodeSatkerTujuanMutasi
 * @property int $BiayaDaratTrasnportMutasi
 * @property int $BiayaLautTrasnportMutasi
 * @property int $UangHarianIiiMutasi
 * @property int $UangHarianViMutasi
 * @property int $JarakJarakTrasnportMutasi
 * @property int $TiketTransportMutasi
 *
 * @property TmstSatker $kodeSatkerAsalMutasi
 * @property TmstSatker $kodeSatkerTujuanMutasi
 */
class TrefBiayaTransportMutasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_biaya_transport_mutasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KodeSatkerAsalMutasi', 'KodeSatkerTujuanMutasi'], 'required'],
            [['KodeSatkerAsalMutasi', 'KodeSatkerTujuanMutasi', 'BiayaDaratTrasnportMutasi', 'BiayaLautTrasnportMutasi', 'UangHarianIiiMutasi', 'UangHarianViMutasi', 'JarakJarakTrasnportMutasi', 'TiketTransportMutasi'], 'integer'],
            [['KodeSatkerAsalMutasi'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['KodeSatkerAsalMutasi' => 'IdSatker']],
            [['KodeSatkerTujuanMutasi'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['KodeSatkerTujuanMutasi' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdBiayaTransport' => 'Id Biaya Transport',
            'KodeSatkerAsalMutasi' => 'Kode Satker Asal Mutasi',
            'KodeSatkerTujuanMutasi' => 'Kode Satker Tujuan Mutasi',
            'BiayaDaratTrasnportMutasi' => 'Biaya Darat Trasnport Mutasi',
            'BiayaLautTrasnportMutasi' => 'Biaya Laut Trasnport Mutasi',
            'UangHarianIiiMutasi' => 'Uang Harian Iii Mutasi',
            'UangHarianViMutasi' => 'Uang Harian Vi Mutasi',
            'JarakJarakTrasnportMutasi' => 'Jarak Jarak Trasnport Mutasi',
            'TiketTransportMutasi' => 'Tiket Transport Mutasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSatkerAsalMutasi()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'KodeSatkerAsalMutasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeSatkerTujuanMutasi()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'KodeSatkerTujuanMutasi']);
    }
}
