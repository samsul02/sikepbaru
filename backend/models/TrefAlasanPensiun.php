<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_alasan_pensiun".
 *
 * @property int $IdAlasanPensiun
 * @property string $AlasanPensiun
 * @property string $Keterangan
 *
 * @property TransPensiun[] $transPensiun
 * @property TransUsulanPensiunDetail[] $transUsulanPensiunDetail
 */
class TrefAlasanPensiun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_alasan_pensiun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AlasanPensiun'], 'required'],
            [['AlasanPensiun'], 'string', 'max' => 100],
            [['Keterangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAlasanPensiun' => 'Id Alasan Pensiun',
            'AlasanPensiun' => 'Alasan Pensiun',
            'Keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPensiun()
    {
        return $this->hasMany(TransPensiun::className(), ['IdAlasanPensiun' => 'IdAlasanPensiun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPensiunDetail()
    {
        return $this->hasMany(TransUsulanPensiunDetail::className(), ['AlasanPensiun' => 'IdAlasanPensiun']);
    }
}
