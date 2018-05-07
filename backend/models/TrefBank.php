<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_bank".
 *
 * @property int $IdBank
 * @property string $NamaBank
 * @property string $KodeBank
 *
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaBank', 'KodeBank'], 'required'],
            [['NamaBank', 'KodeBank'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdBank' => 'Id Bank',
            'NamaBank' => 'Nama Bank',
            'KodeBank' => 'Kode Bank',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['KodeBankPegawai' => 'IdBank']);
    }
}
