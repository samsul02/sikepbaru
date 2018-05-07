<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_cuti".
 *
 * @property int $IdJenisCuti
 * @property string $NamaJenisCuti
 *
 * @property TransRiwayatCuti[] $transRiwayatCuti
 */
class TrefJenisCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisCuti'], 'required'],
            [['NamaJenisCuti'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisCuti' => 'Id Jenis Cuti',
            'NamaJenisCuti' => 'Nama Jenis Cuti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatCuti()
    {
        return $this->hasMany(TransRiwayatCuti::className(), ['IdJenisCuti' => 'IdJenisCuti']);
    }
}
