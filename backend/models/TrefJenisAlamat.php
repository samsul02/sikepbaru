<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_alamat".
 *
 * @property int $IdJenisAlamat
 * @property string $NamaJenisAlamat
 *
 * @property TmstAlamatPegawai[] $tmstAlamatPegawai
 */
class TrefJenisAlamat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_alamat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisAlamat'], 'required'],
            [['NamaJenisAlamat'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisAlamat' => 'Id Jenis Alamat',
            'NamaJenisAlamat' => 'Nama Jenis Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstAlamatPegawai()
    {
        return $this->hasMany(TmstAlamatPegawai::className(), ['JenisAlamat' => 'IdJenisAlamat']);
    }
}
