<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_status_perkawinan".
 *
 * @property int $IdStatusKawin
 * @property string $NamaStatusKawin
 *
 * @property TmstKeluarga[] $tmstKeluarga
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefStatusPerkawinan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_status_perkawinan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaStatusKawin'], 'required'],
            [['NamaStatusKawin'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdStatusKawin' => 'Id Status Kawin',
            'NamaStatusKawin' => 'Status Kawin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKeluarga()
    {
        return $this->hasMany(TmstKeluarga::className(), ['StatusPerkawinan' => 'IdStatusKawin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['StatusPerkawinan' => 'IdStatusKawin']);
    }
}
