<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_pangkat".
 *
 * @property int $IdJenisPangkat
 * @property string $NamaJenisPangkat
 *
 * @property TransRiwayatPangkat[] $transRiwayatPangkat
 */
class TrefJenisPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisPangkat'], 'required'],
            [['NamaJenisPangkat'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisPangkat' => 'Id Jenis Pangkat',
            'NamaJenisPangkat' => 'Nama Jenis Pangkat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPangkat()
    {
        return $this->hasMany(TransRiwayatPangkat::className(), ['IdJenisPangkat' => 'IdJenisPangkat']);
    }
}
