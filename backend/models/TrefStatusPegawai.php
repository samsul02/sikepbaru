<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_status_pegawai".
 *
 * @property int $IdStatusPegawai
 * @property string $StatusPegawai
 * @property string $Keterangan
 *
 * @property TmstPegawai[] $tmstPegawai
 */
class TrefStatusPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_status_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StatusPegawai'], 'required'],
            [['StatusPegawai'], 'string', 'max' => 100],
            [['Keterangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdStatusPegawai' => 'Id Status Pegawai',
            'StatusPegawai' => 'Status Pegawai',
            'Keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['StatusPegawai' => 'IdStatusPegawai']);
    }
}
