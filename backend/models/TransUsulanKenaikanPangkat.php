<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_kenaikan_pangkat".
 *
 * @property int $IdUsulanKenaikanPangkat
 * @property int $IdPegawai
 *
 * @property TmstPegawai $pegawai
 */
class TransUsulanKenaikanPangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_kenaikan_pangkat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai'], 'required'],
            [['IdPegawai'], 'integer'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanKenaikanPangkat' => 'Id Usulan Kenaikan Pangkat',
            'IdPegawai' => 'Id Pegawai',
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
