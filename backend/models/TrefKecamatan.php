<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_kecamatan".
 *
 * @property int $IdKecamatan
 * @property string $NamaKecamatan
 * @property int $IdKabupaten
 *
 * @property TmstAlamatPegawai[] $tmstAlamatPegawai
 */
class TrefKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaKecamatan', 'IdKabupaten'], 'required'],
            [['IdKabupaten'], 'integer'],
            [['NamaKecamatan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKecamatan' => 'Id Kecamatan',
            'NamaKecamatan' => 'Nama Kecamatan',
            'IdKabupaten' => 'Id Kabupaten',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstAlamatPegawai()
    {
        return $this->hasMany(TmstAlamatPegawai::className(), ['KodeKecamatan' => 'IdKecamatan']);
    }
}
