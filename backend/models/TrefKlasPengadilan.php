<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_klas_pengadilan".
 *
 * @property int $IdKlasPengadilan
 * @property string $NamaKlasPengadilan
 *
 * @property TmstSatker[] $tmstSatker
 */
class TrefKlasPengadilan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_klas_pengadilan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaKlasPengadilan'], 'required'],
            [['NamaKlasPengadilan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKlasPengadilan' => 'Id Klas Pengadilan',
            'NamaKlasPengadilan' => 'Nama Klas Pengadilan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstSatker()
    {
        return $this->hasMany(TmstSatker::className(), ['IdKlasPengadilan' => 'IdKlasPengadilan']);
    }
}
