<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_gaji_tunjangan".
 *
 * @property int $IdRefGajiTunjangan
 * @property string $KodeGajiTunjangan
 * @property string $NamaGajiTunjangan
 * @property int $IdGajiPokok
 * @property int $Tunjangan
 * @property int $RemunisasiGajiTunjangan
 *
 * @property TrefGajiPokok $gajiPokok
 */
class TrefGajiTunjangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_gaji_tunjangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdGajiPokok', 'Tunjangan', 'RemunisasiGajiTunjangan'], 'integer'],
            [['KodeGajiTunjangan'], 'string', 'max' => 3],
            [['NamaGajiTunjangan'], 'string', 'max' => 192],
            [['IdGajiPokok'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGajiPokok::className(), 'targetAttribute' => ['IdGajiPokok' => 'IdGajiPokok']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefGajiTunjangan' => 'Id Ref Gaji Tunjangan',
            'KodeGajiTunjangan' => 'Kode Gaji Tunjangan',
            'NamaGajiTunjangan' => 'Nama Gaji Tunjangan',
            'IdGajiPokok' => 'Id Gaji Pokok',
            'Tunjangan' => 'Tunjangan',
            'RemunisasiGajiTunjangan' => 'Remunisasi Gaji Tunjangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGajiPokok()
    {
        return $this->hasOne(TrefGajiPokok::className(), ['IdGajiPokok' => 'IdGajiPokok']);
    }
}
