<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_lokasi".
 *
 * @property int $IdLokasi
 * @property string $NamaLokasi
 *
 * @property TmstStrukturOrganisasi[] $tmstStrukturOrganisasi
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail
 */
class TrefLokasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_lokasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaLokasi'], 'required'],
            [['NamaLokasi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdLokasi' => 'Id Lokasi',
            'NamaLokasi' => 'Nama Lokasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstStrukturOrganisasi()
    {
        return $this->hasMany(TmstStrukturOrganisasi::className(), ['LokasiStrukturOrganisasi' => 'IdLokasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdLokasi' => 'IdLokasi']);
    }
}
