<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_pemberian_satya_lencana".
 *
 * @property int $IdUsulanPenghargaan
 * @property int $IdPegawai
 * @property int $IdTandaJasa
 * @property int $Pengusul
 * @property string $TanggalUsulan
 *
 * @property TmstPegawai $pegawai
 * @property TrefTandaJasa $tandaJasa
 */
class TransUsulanPemberianSatyaLencana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_pemberian_satya_lencana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdTandaJasa', 'Pengusul', 'TanggalUsulan'], 'required'],
            [['IdPegawai', 'IdTandaJasa', 'Pengusul'], 'integer'],
            [['TanggalUsulan'], 'safe'],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
            [['IdTandaJasa'], 'exist', 'skipOnError' => true, 'targetClass' => TrefTandaJasa::className(), 'targetAttribute' => ['IdTandaJasa' => 'IdTandaJasa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanPenghargaan' => 'Id Usulan Penghargaan',
            'IdPegawai' => 'Id Pegawai',
            'IdTandaJasa' => 'Id Tanda Jasa',
            'Pengusul' => 'Pengusul',
            'TanggalUsulan' => 'Tanggal Usulan',
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
    public function getTandaJasa()
    {
        return $this->hasOne(TrefTandaJasa::className(), ['IdTandaJasa' => 'IdTandaJasa']);
    }
}
