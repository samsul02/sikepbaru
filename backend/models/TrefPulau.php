<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_pulau".
 *
 * @property int $IdPulau
 * @property string $NamaPulau
 *
 * @property TmstSatker[] $tmstSatker
 * @property TrefPropinsi[] $trefPropinsi
 */
class TrefPulau extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_pulau';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaPulau'], 'required'],
            [['NamaPulau'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPulau' => 'Id Pulau',
            'NamaPulau' => 'Nama Pulau',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstSatker()
    {
        return $this->hasMany(TmstSatker::className(), ['IdPulauSatker' => 'IdPulau']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefPropinsi()
    {
        return $this->hasMany(TrefPropinsi::className(), ['IdPulau' => 'IdPulau']);
    }
}
