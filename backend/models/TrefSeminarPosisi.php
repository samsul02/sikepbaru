<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_seminar_posisi".
 *
 * @property int $IdSeminarPosisi
 * @property string $NamaSeminarPosisi
 *
 * @property TransRiwayatSeminar[] $transRiwayatSeminar
 */
class TrefSeminarPosisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tref_seminar_posisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NamaSeminarPosisi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdSeminarPosisi' => 'Id Seminar Posisi',
            'NamaSeminarPosisi' => 'Nama Seminar Posisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSeminar()
    {
        return $this->hasMany(TransRiwayatSeminar::className(), ['IdStatusKedudukan' => 'IdSeminarPosisi']);
    }
}
