<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_bentuk_muka".
 *
 * @property int $IdBentukMuka
 * @property string $NamaBentukMuka
 *
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefBentukMuka extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_bentuk_muka';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaBentukMuka'], 'required'],
            [['NamaBentukMuka'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdBentukMuka' => 'Id Bentuk Muka',
            'NamaBentukMuka' => 'Bentuk Muka',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['BentukMuka' => 'IdBentukMuka']);
    }
}
