<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_diklat_sektor".
 *
 * @property int $IdDiklatSektor
 * @property string $NamaDiklatSektor
 *
 * @property TrefJenisDiklatTeknis[] $trefJenisDiklatTeknis
 */
class TrefDiklatSektor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_diklat_sektor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaDiklatSektor'], 'required'],
            [['NamaDiklatSektor'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdDiklatSektor' => 'Id Diklat Sektor',
            'NamaDiklatSektor' => 'Nama Diklat Sektor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefJenisDiklatTeknis()
    {
        return $this->hasMany(TrefJenisDiklatTeknis::className(), ['IdDiklatSektor' => 'IdDiklatSektor']);
    }
}
