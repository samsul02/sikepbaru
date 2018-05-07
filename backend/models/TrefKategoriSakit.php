<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_kategori_sakit".
 *
 * @property int $IdKategoriSakit
 * @property string $KategoriSakit
 *
 * @property TransRiwayatKesehatan[] $transRiwayatKesehatan
 */
class TrefKategoriSakit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_kategori_sakit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KategoriSakit'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKategoriSakit' => 'Id Kategori Sakit',
            'KategoriSakit' => 'Kategori Sakit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatKesehatan()
    {
        return $this->hasMany(TransRiwayatKesehatan::className(), ['KategoriSakit' => 'IdKategoriSakit']);
    }
}
