<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_warna_kulit".
 *
 * @property int $IdWarnaKulit
 * @property string $NamaWarnaKulit
 *
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefWarnaKulit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_warna_kulit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaWarnaKulit'], 'required'],
            [['NamaWarnaKulit'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdWarnaKulit' => 'Id Warna Kulit',
            'NamaWarnaKulit' => 'Warna Kulit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['WarnaKulit' => 'IdWarnaKulit']);
    }
}
