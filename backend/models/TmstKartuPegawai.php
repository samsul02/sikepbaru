<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_kartu_pegawai".
 *
 * @property int $IdKartu
 * @property int $IdPegawai
 * @property int $IdRefKartu
 * @property string $NoKartu
 * @property string $DokumenKartu
 * @property string $Keterangan
 *
 * @property TrefKartu $refKartu
 * @property TmstPegawai $pegawai
 */
class TmstKartuPegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_kartu_pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdRefKartu', 'NoKartu'], 'required'],
            [['IdPegawai', 'IdRefKartu'], 'integer'],
            [['NoKartu'], 'string', 'max' => 100],
            [['DokumenKartu', 'Keterangan'], 'string', 'max' => 255],
            [['IdRefKartu'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKartu::className(), 'targetAttribute' => ['IdRefKartu' => 'IdRefKartu']],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IDPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKartu' => 'Id Kartu',
            'IdPegawai' => 'Id Pegawai',
            'IdRefKartu' => 'Id Ref Kartu',
            'NoKartu' => 'No Kartu',
            'DokumenKartu' => 'Dokumen Kartu',
            'Keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKartu()
    {
        return $this->hasOne(TrefKartu::className(), ['IdRefKartu' => 'IdRefKartu']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IDPegawai' => 'IdPegawai']);
    }
}
