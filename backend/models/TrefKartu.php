<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_kartu".
 *
 * @property int $IdRefKartu
 * @property string $NamaRefKartu
 *
 * @property TmstKartuPegawai[] $tmstKartuPegawai
 */
class TrefKartu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_kartu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaRefKartu'], 'required'],
            [['NamaRefKartu'], 'string', 'max' => 192],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefKartu' => 'Id Ref Kartu',
            'NamaRefKartu' => 'Nama Ref Kartu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstKartuPegawai()
    {
        return $this->hasMany(TmstKartuPegawai::className(), ['IdRefKartu' => 'IdRefKartu']);
    }
}
