<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_propinsi".
 *
 * @property int $IdPropinsi
 * @property string $NamaPropinsi
 * @property int $IdPulau
 *
 * @property TmstAlamatPegawai[] $tmstAlamatPegawai
 * @property TmstPegawai[] $tmstPegawai
 * @property TmstSatker[] $tmstSatker
 * @property TrefKabupaten[] $trefKabupaten
 * @property TrefPulau $pulau
 */
class TrefPropinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_propinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaPropinsi', 'IdPulau'], 'required'],
            [['IdPulau'], 'integer'],
            [['NamaPropinsi'], 'string', 'max' => 200],
            [['IdPulau'], 'exist', 'skipOnError' => true, 'targetClass' => TrefPulau::className(), 'targetAttribute' => ['IdPulau' => 'IdPulau']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPropinsi' => 'Id Propinsi',
            'NamaPropinsi' => 'Nama Propinsi',
            'IdPulau' => 'Id Pulau',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstAlamatPegawai()
    {
        return $this->hasMany(TmstAlamatPegawai::className(), ['KodePropinsiTempatTinggal' => 'IdPropinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['PropinsiTempatLahir' => 'IdPropinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstSatker()
    {
        return $this->hasMany(TmstSatker::className(), ['IdPropinsiSatker' => 'IdPropinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefKabupaten()
    {
        return $this->hasMany(TrefKabupaten::className(), ['IdPropinsi' => 'IdPropinsi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPulau()
    {
        return $this->hasOne(TrefPulau::className(), ['IdPulau' => 'IdPulau']);
    }
}
