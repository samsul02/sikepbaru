<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_agama".
 *
 * @property int $IdAgama
 * @property string $NamaAgama
 *
 * @property TmstKeluarga[] $tmstKeluarga
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefAgama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaAgama'], 'required'],
            [['NamaAgama'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAgama' => 'Id Agama',
            'NamaAgama' => 'Agama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKeluarga()
    {
        return $this->hasMany(TmstKeluarga::className(), ['Agama' => 'IdAgama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['Agama' => 'IdAgama']);
    }
}
