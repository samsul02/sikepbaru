<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_satker".
 *
 * @property int $IdJenisSatker
 * @property string $NamaJenisSatker
 * @property int $IdLingkunganPeradilan
 *
 * @property TmstStrukturOrganisasi[] $tmstStrukturOrganisasi
 * @property TrefLingkunganPeradilan $lingkunganPeradilan
 */
class TrefJenisSatker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_satker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisSatker', 'IdLingkunganPeradilan'], 'required'],
            [['IdLingkunganPeradilan'], 'integer'],
            [['NamaJenisSatker'], 'string', 'max' => 50],
            [['IdLingkunganPeradilan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefLingkunganPeradilan::className(), 'targetAttribute' => ['IdLingkunganPeradilan' => 'IdLingkunganPeradilan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisSatker' => 'Id Jenis Satker',
            'NamaJenisSatker' => 'Nama Jenis Satker',
            'IdLingkunganPeradilan' => 'Id Lingkungan Peradilan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstStrukturOrganisasi()
    {
        return $this->hasMany(TmstStrukturOrganisasi::className(), ['KodeJenisSatkerStrukturOrganisasi' => 'IdJenisSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLingkunganPeradilan()
    {
        return $this->hasOne(TrefLingkunganPeradilan::className(), ['IdLingkunganPeradilan' => 'IdLingkunganPeradilan']);
    }
}
