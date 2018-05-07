<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_tpm_pnppjs".
 *
 * @property int $IdUsulanTPMPNPPJS
 * @property string $NoRegisterUsulanTPMPNPPJS
 * @property string $TanggalUsulanTPMPNPPJS
 * @property string $TahunUsulanTPMPNPPJS
 * @property string $PeriodeUsulanTPMPNPPJS
 * @property int $IdSatkerUsulanTPMPNPPJS
 * @property string $StatusUsulanTPMPNPPJS
 *
 * @property TmstSatker $satkerUsulanTPMPNPPJS
 * @property TransUsulanTpmPnppjsDetail[] $transUsulanTpmPnppjsDetail
 */
class TransUsulanTpmPnppjs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_tpm_pnppjs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NoRegisterUsulanTPMPNPPJS'], 'required'],
            [['TanggalUsulanTPMPNPPJS', 'TahunUsulanTPMPNPPJS'], 'safe'],
            [['IdSatkerUsulanTPMPNPPJS'], 'integer'],
            [['NoRegisterUsulanTPMPNPPJS'], 'string', 'max' => 100],
            [['PeriodeUsulanTPMPNPPJS'], 'string', 'max' => 10],
            [['StatusUsulanTPMPNPPJS'], 'string', 'max' => 1],
            [['IdSatkerUsulanTPMPNPPJS'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerUsulanTPMPNPPJS' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanTPMPNPPJS' => 'Id Usulan Tpmpnppjs',
            'NoRegisterUsulanTPMPNPPJS' => 'No Register Usulan Tpmpnppjs',
            'TanggalUsulanTPMPNPPJS' => 'Tanggal Usulan Tpmpnppjs',
            'TahunUsulanTPMPNPPJS' => 'Tahun Usulan Tpmpnppjs',
            'PeriodeUsulanTPMPNPPJS' => 'Periode Usulan Tpmpnppjs',
            'IdSatkerUsulanTPMPNPPJS' => 'Id Satker Usulan Tpmpnppjs',
            'StatusUsulanTPMPNPPJS' => 'Status Usulan Tpmpnppjs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerUsulanTPMPNPPJS()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerUsulanTPMPNPPJS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanTpmPnppjsDetail()
    {
        return $this->hasMany(TransUsulanTpmPnppjsDetail::className(), ['IdUsulanTPMPNPPJS' => 'IdUsulanTPMPNPPJS']);
    }
}
