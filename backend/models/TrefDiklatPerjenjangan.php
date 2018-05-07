<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_diklat_perjenjangan".
 *
 * @property int $IdDiklatPerjenjangan
 * @property int $LevelDiklatPerjenjangan
 * @property string $NamaDiklatPerjenjangan
 *
 * @property TransRiwayatDiklatPerjenjangan[] $transRiwayatDiklatPerjenjangan
 */
class TrefDiklatPerjenjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_diklat_perjenjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LevelDiklatPerjenjangan'], 'required'],
            [['LevelDiklatPerjenjangan'], 'integer'],
            [['NamaDiklatPerjenjangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdDiklatPerjenjangan' => 'Id Diklat Perjenjangan',
            'LevelDiklatPerjenjangan' => 'Level Diklat Perjenjangan',
            'NamaDiklatPerjenjangan' => 'Nama Diklat Perjenjangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatDiklatPerjenjangan()
    {
        return $this->hasMany(TransRiwayatDiklatPerjenjangan::className(), ['IdDiklatPerjenjangan' => 'IdDiklatPerjenjangan']);
    }
}
