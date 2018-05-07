<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_fungsional_kelompok".
 *
 * @property int $IdFungsionalKelompok
 * @property string $NamaFungsionalKelompok
 *
 * @property TransRiwayatDiklatFungsional[] $transRiwayatDiklatFungsional
 */
class TrefFungsionalKelompok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_fungsional_kelompok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaFungsionalKelompok'], 'required'],
            [['NamaFungsionalKelompok'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdFungsionalKelompok' => 'Id Fungsional Kelompok',
            'NamaFungsionalKelompok' => 'Nama Fungsional Kelompok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatFungsional()
    {
        return $this->hasMany(TransRiwayatDiklatFungsional::className(), ['IdFungsionalKelompok' => 'IdFungsionalKelompok']);
    }
}
