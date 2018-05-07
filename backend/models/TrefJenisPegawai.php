<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_pegawai".
 *
 * @property int $IdJenisPegawai
 * @property string $NamaJenisPegawai
 *
 * @property TmstPegawai[] $tmstPegawai
 * @property TrefGolonganRuang[] $trefGolonganRuang
 */
class TrefJenisPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaJenisPegawai'], 'required'],
            [['NamaJenisPegawai'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdJenisPegawai' => 'Id Jenis Pegawai',
            'NamaJenisPegawai' => 'Jenis Pegawai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmstPegawai()
    {
        return $this->hasMany(TmstPegawai::className(), ['JenisPegawai' => 'IdJenisPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefGolonganRuang()
    {
        return $this->hasMany(TrefGolonganRuang::className(), ['IdJenisPegawai' => 'IdJenisPegawai']);
    }
}
