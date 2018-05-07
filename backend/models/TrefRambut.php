<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_rambut".
 *
 * @property int $IdJenisRambut
 * @property string $NamaJenisRambut
 *
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefRambut extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_rambut';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisRambut'], 'required'],
            [['NamaJenisRambut'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisRambut' => 'Id Jenis Rambut',
            'NamaJenisRambut' => 'Jenis Rambut',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['Rambut' => 'IdJenisRambut']);
    }
}
