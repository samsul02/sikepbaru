<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_diklat_kelompok".
 *
 * @property int $IdKelompokDiklat
 * @property string $NamaKelompokDiklat
 *
 * @property TrefJenisDiklatTeknis[] $trefJenisDiklatTeknis
 */
class TrefDiklatKelompok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_diklat_kelompok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaKelompokDiklat'], 'required'],
            [['NamaKelompokDiklat'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKelompokDiklat' => 'Id Kelompok Diklat',
            'NamaKelompokDiklat' => 'Nama Kelompok Diklat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefJenisDiklatTeknis()
    {
        return $this->hasMany(TrefJenisDiklatTeknis::className(), ['IdDiklatKelompok' => 'IdKelompokDiklat']);
    }
}
