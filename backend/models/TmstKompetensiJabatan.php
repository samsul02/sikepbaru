<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_kompetensi_jabatan".
 *
 * @property int $IdKompetensiJabatan
 * @property int $IdJabatan
 * @property string $Kompetensi
 *
 * @property TrefJabatan $jabatan
 */
class TmstKompetensiJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_kompetensi_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdJabatan', 'Kompetensi'], 'required'],
            [['IdJabatan'], 'integer'],
            [['Kompetensi'], 'string', 'max' => 200],
            [['IdJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatan' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKompetensiJabatan' => 'Id Kompetensi Jabatan',
            'IdJabatan' => 'Id Jabatan',
            'Kompetensi' => 'Kompetensi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatan']);
    }
}
