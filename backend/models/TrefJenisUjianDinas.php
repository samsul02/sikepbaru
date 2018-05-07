<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_ujian_dinas".
 *
 * @property int $IdJenisUjian
 * @property string $JenisUjian
 *
 * @property TransRiwayatUjianDinas[] $transRiwayatUjianDinas
 */
class TrefJenisUjianDinas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_ujian_dinas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JenisUjian'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisUjian' => 'Id Jenis Ujian',
            'JenisUjian' => 'Jenis Ujian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatUjianDinas()
    {
        return $this->hasMany(TransRiwayatUjianDinas::className(), ['JenisUjian' => 'IdJenisUjian']);
    }
}
