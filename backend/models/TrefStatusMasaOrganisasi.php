<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_status_masa_organisasi".
 *
 * @property int $IdStatusMasaOrganisasi
 * @property string $NamaStatusMasaOrganisasi
 *
 * @property TransRiwayatOrganisasi[] $transRiwayatOrganisasi
 */
class TrefStatusMasaOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_status_masa_organisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaStatusMasaOrganisasi'], 'required'],
            [['NamaStatusMasaOrganisasi'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdStatusMasaOrganisasi' => 'Id Status Masa Organisasi',
            'NamaStatusMasaOrganisasi' => 'Nama Status Masa Organisasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatOrganisasi()
    {
        return $this->hasMany(TransRiwayatOrganisasi::className(), ['IdStatusMasaOrganisasi' => 'IDStatusMasaOrganisasi']);
    }
}
