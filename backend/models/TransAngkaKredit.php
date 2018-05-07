<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_angka_kredit".
 *
 * @property int $IdAngkaKredit
 * @property int $IdPegawai
 * @property int $IdGolonganRuang
 * @property int $AngkaKreditPegawai
 *
 * @property TmstPegawai $pegawai
 * @property TrefGolonganRuang $golonganRuang
 */
class TransAngkaKredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_angka_kredit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdGolonganRuang', 'AngkaKreditPegawai'], 'required'],
            [['IdPegawai', 'IdGolonganRuang', 'AngkaKreditPegawai'], 'integer'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdGolonganRuang'], 'exist', 'skipOnError' => true, 'targetClass' => TrefGolonganRuang::className(), 'targetAttribute' => ['IdGolonganRuang' => 'IdGolonganRuang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdAngkaKredit' => 'Id Angka Kredit',
            'IdPegawai' => 'Id Pegawai',
            'IdGolonganRuang' => 'Id Golongan Ruang',
            'AngkaKreditPegawai' => 'Angka Kredit Pegawai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolonganRuang()
    {
        return $this->hasOne(TrefGolonganRuang::className(), ['IdGolonganRuang' => 'IdGolonganRuang']);
    }
}
