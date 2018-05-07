<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_golongan_darah".
 *
 * @property int $IdGolonganDarah
 * @property string $NamaGolonganDarah
 *
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefGolonganDarah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_golongan_darah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaGolonganDarah'], 'required'],
            [['NamaGolonganDarah'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdGolonganDarah' => 'Id Golongan Darah',
            'NamaGolonganDarah' => 'Golongan Darah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['GolonganDarah' => 'IdGolonganDarah']);
    }
}
