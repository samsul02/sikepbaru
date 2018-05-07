<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_kppn".
 *
 * @property int $IdKPPN
 * @property string $KodeKPPN
 * @property string $NamaKPPN
 * @property string $KotaKPPN
 *
 * @property TransRiwayatJabatan[] $transRiwayatJabatan
 * @property TransRiwayatKgb[] $transRiwayatKgb
 * @property TransUsulanKgb[] $transUsulanKgb
 * @property TransUsulanKpDetail[] $transUsulanKpDetail
 * @property TransUsulanKpoDetail[] $transUsulanKpoDetail
 */
class TrefKppn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_kppn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KodeKPPN'], 'required'],
            [['KodeKPPN'], 'string', 'max' => 3],
            [['NamaKPPN', 'KotaKPPN'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKPPN' => 'Id Kppn',
            'KodeKPPN' => 'Kode Kppn',
            'NamaKPPN' => 'Nama Kppn',
            'KotaKPPN' => 'Kota Kppn',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatJabatan()
    {
        return $this->hasMany(TransRiwayatJabatan::className(), ['IdKPPN' => 'IdKPPN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKgb()
    {
        return $this->hasMany(TransRiwayatKgb::className(), ['KPPNKGBPegawai' => 'IdKPPN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKgb()
    {
        return $this->hasMany(TransUsulanKgb::className(), ['IdKPPN' => 'IdKPPN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpDetail()
    {
        return $this->hasMany(TransUsulanKpDetail::className(), ['IdKPPN' => 'IdKPPN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanKpoDetail()
    {
        return $this->hasMany(TransUsulanKpoDetail::className(), ['IdKPPN' => 'IdKPPN']);
    }
}
