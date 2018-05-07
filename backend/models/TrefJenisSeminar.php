<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_seminar".
 *
 * @property int $IdJenisSeminar
 * @property string $NamaJenisSeminar
 *
 * @property TransRiwayatSeminar[] $transRiwayatSeminar
 */
class TrefJenisSeminar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_seminar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisSeminar'], 'required'],
            [['NamaJenisSeminar'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisSeminar' => 'Id Jenis Seminar',
            'NamaJenisSeminar' => 'Nama Jenis Seminar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSeminar()
    {
        return $this->hasMany(TransRiwayatSeminar::className(), ['IdJenisSeminar' => 'IdJenisSeminar']);
    }
}
