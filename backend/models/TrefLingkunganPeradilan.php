<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_lingkungan_peradilan".
 *
 * @property int $IdLingkunganPeradilan
 * @property string $NamaLingkunganPeradilan
 *
 * @property TmstSatker[] $tmstSatker
 * @property TrefJenisSatker[] $trefJenisSatker
 */
class TrefLingkunganPeradilan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_lingkungan_peradilan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaLingkunganPeradilan'], 'required'],
            [['NamaLingkunganPeradilan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdLingkunganPeradilan' => 'Id Lingkungan Peradilan',
            'NamaLingkunganPeradilan' => 'Nama Lingkungan Peradilan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstSatker()
    {
        return $this->hasMany(TmstSatker::className(), ['IdBandingLingkunganPeradilan' => 'IdLingkunganPeradilan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefJenisSatker()
    {
        return $this->hasMany(TrefJenisSatker::className(), ['IdLingkunganPeradilan' => 'IdLingkunganPeradilan']);
    }
}
