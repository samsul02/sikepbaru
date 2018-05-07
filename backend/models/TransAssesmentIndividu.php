<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_assesment_individu".
 *
 * @property int $IdAssesementIndividu
 * @property int $IdPegawai
 * @property string $TanggalAssesment
 * @property string $HasilAssesment
 * @property string $DokumenHasilAssesment
 *
 * @property TmstPegawai $pegawai
 */
class TransAssesmentIndividu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_assesment_individu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TanggalAssesment', 'HasilAssesment'], 'required'],
            [['IdPegawai'], 'integer'],
            [['TanggalAssesment'], 'safe'],
            [['HasilAssesment'], 'string', 'max' => 20],
            [['DokumenHasilAssesment'], 'string', 'max' => 200],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAssesementIndividu' => 'Id Assesement Individu',
            'IdPegawai' => 'Id Pegawai',
            'TanggalAssesment' => 'Tanggal Assesment',
            'HasilAssesment' => 'Hasil Assesment',
            'DokumenHasilAssesment' => 'Dokumen Hasil Assesment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }
}
