<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_status_tugas_belajar".
 *
 * @property int $IdStatusTugasBelajar
 * @property string $NamaStatusTugasBelajar
 *
 * @property TransRiwayatTugasBelajar[] $transRiwayatTugasBelajar
 */
class TrefStatusTugasBelajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_status_tugas_belajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaStatusTugasBelajar'], 'required'],
            [['NamaStatusTugasBelajar'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdStatusTugasBelajar' => 'Id Status Tugas Belajar',
            'NamaStatusTugasBelajar' => 'Nama Status Tugas Belajar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatTugasBelajar()
    {
        return $this->hasMany(TransRiwayatTugasBelajar::className(), ['IdStatusTugasBelajar' => 'IdStatusTugasBelajar']);
    }
}
