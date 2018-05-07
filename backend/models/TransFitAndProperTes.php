<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_fit_and_proper_tes".
 *
 * @property int $IdFitandProperTest
 * @property int $IdPegawai
 * @property string $TanggalTes
 * @property string $Tahun
 * @property int $NilaiFitandProperTest
 *
 * @property TmstPegawai $pegawai
 */
class TransFitAndProperTes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_fit_and_proper_tes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'TanggalTes', 'Tahun', 'NilaiFitandProperTest'], 'required'],
            [['IdPegawai', 'NilaiFitandProperTest'], 'integer'],
            [['TanggalTes', 'Tahun'], 'safe'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdFitandProperTest' => 'Id Fitand Proper Test',
            'IdPegawai' => 'Id Pegawai',
            'TanggalTes' => 'Tanggal Tes',
            'Tahun' => 'Tahun',
            'NilaiFitandProperTest' => 'Nilai Fitand Proper Test',
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
