<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_promosi_mutasi".
 *
 * @property int $IdUsulanPromosiMutasi
 * @property int $TanggalUsulanPromosiMutasi
 * @property string $PeriodeUsulanPromosiMutasi
 * @property string $StatusUsulanPromosiMutasi
 *
 * @property TmstPegawai $tanggalUsulanPromosiMutasi
 * @property TransUsulanPromosiMutasiDetail[] $transUsulanPromosiMutasiDetail
 */
class TransUsulanPromosiMutasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_promosi_mutasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TanggalUsulanPromosiMutasi', 'PeriodeUsulanPromosiMutasi', 'StatusUsulanPromosiMutasi'], 'required'],
            [['TanggalUsulanPromosiMutasi'], 'integer'],
            [['PeriodeUsulanPromosiMutasi', 'StatusUsulanPromosiMutasi'], 'string', 'max' => 30],
            [['TanggalUsulanPromosiMutasi'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['TanggalUsulanPromosiMutasi' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPromosiMutasi' => 'Id Usulan Promosi Mutasi',
            'TanggalUsulanPromosiMutasi' => 'Tanggal Usulan Promosi Mutasi',
            'PeriodeUsulanPromosiMutasi' => 'Periode Usulan Promosi Mutasi',
            'StatusUsulanPromosiMutasi' => 'Status Usulan Promosi Mutasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTanggalUsulanPromosiMutasi()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'TanggalUsulanPromosiMutasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransUsulanPromosiMutasiDetail()
    {
        return $this->hasMany(TransUsulanPromosiMutasiDetail::className(), ['IdUsulanPromosiMutasi' => 'IdUsulanPromosiMutasi']);
    }
}
