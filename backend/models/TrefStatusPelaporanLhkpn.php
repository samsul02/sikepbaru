<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_status_pelaporan_lhkpn".
 *
 * @property int $IdStatusPelaporan
 * @property string $StatusPelaporan
 *
 * @property TransRiwayatLhkpn[] $transRiwayatLhkpn
 */
class TrefStatusPelaporanLhkpn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_status_pelaporan_lhkpn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StatusPelaporan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdStatusPelaporan' => 'Id Status Pelaporan',
            'StatusPelaporan' => 'Status Pelaporan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatLhkpn()
    {
        return $this->hasMany(TransRiwayatLhkpn::className(), ['StatusPelaporan' => 'IdStatusPelaporan']);
    }
}
