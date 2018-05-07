<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_kp".
 *
 * @property int $IdUsulanKP
 * @property string $NoUsulanKP
 * @property string $TanggalUsulanKP
 * @property string $TahunUsulanKP
 * @property int $IdPeriodeKP
 * @property int $IdSatkerUsulanKP
 * @property string $NamaPejabatUsulanKP
 *
 * @property TmstSatker $satkerUsulanKP
 * @property TransUsulanKpDetail[] $transUsulanKpDetail
 */
class TransUsulanKp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_kp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TanggalUsulanKP', 'TahunUsulanKP'], 'safe'],
            [['IdPeriodeKP', 'IdSatkerUsulanKP'], 'integer'],
            [['NoUsulanKP'], 'string', 'max' => 50],
            [['NamaPejabatUsulanKP'], 'string', 'max' => 150],
            [['IdSatkerUsulanKP'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerUsulanKP' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanKP' => 'Id Usulan Kp',
            'NoUsulanKP' => 'No Usulan Kp',
            'TanggalUsulanKP' => 'Tanggal Usulan Kp',
            'TahunUsulanKP' => 'Tahun Usulan Kp',
            'IdPeriodeKP' => 'Id Periode Kp',
            'IdSatkerUsulanKP' => 'Id Satker Usulan Kp',
            'NamaPejabatUsulanKP' => 'Nama Pejabat Usulan Kp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerUsulanKP()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerUsulanKP']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpDetail()
    {
        return $this->hasMany(TransUsulanKpDetail::className(), ['IdUsulanKP' => 'IdUsulanKP']);
    }
}
