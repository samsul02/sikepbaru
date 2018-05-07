<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_diklat_fungsional".
 *
 * @property int $IdJenisDiklatFungsional
 * @property string $NamaJenisDiklatFungsional
 *
 * @property TransRiwayatDiklatFungsional[] $transRiwayatDiklatFungsional
 */
class TrefDiklatFungsional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_diklat_fungsional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisDiklatFungsional'], 'required'],
            [['NamaJenisDiklatFungsional'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisDiklatFungsional' => 'Id Jenis Diklat Fungsional',
            'NamaJenisDiklatFungsional' => 'Nama Jenis Diklat Fungsional',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatFungsional()
    {
        return $this->hasMany(TransRiwayatDiklatFungsional::className(), ['IdDiklatFungsionalJenis' => 'IdJenisDiklatFungsional']);
    }
}
