<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_skp_detail".
 *
 * @property int $IdSKPDetil
 * @property int $IdRiwayatSKP
 * @property string $TugasTambahan
 * @property string $Kreativitias
 *
 * @property TransKegTugasJabatanDetail[] $transKegTugasJabatanDetail
 */
class TransSkpDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_skp_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdRiwayatSKP'], 'required'],
            [['IdRiwayatSKP'], 'integer'],
            [['TugasTambahan', 'Kreativitias'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdSKPDetil' => 'Id Skpdetil',
            'IdRiwayatSKP' => 'Id Riwayat Skp',
            'TugasTambahan' => 'Tugas Tambahan',
            'Kreativitias' => 'Kreativitias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransKegTugasJabatanDetail()
    {
        return $this->hasMany(TransKegTugasJabatanDetail::className(), ['IdSKPDetil' => 'IdSKPDetil']);
    }
}
