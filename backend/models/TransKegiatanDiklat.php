<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_kegiatan_diklat".
 *
 * @property int $IdKegiatanDiklat
 * @property string $NamaKegiatanDiklat
 * @property int $JenisDiklat
 * @property int $LamaDiklat
 * @property string $JadwalDiklat
 * @property string $PenyelenggaraDiklat
 * @property string $LokasiKegiatanDiklat
 * @property int $NegaraKegiatanDiklat
 * @property int $KotaKegiatanDiklat
 *
 * @property TrefNegara $negaraKegiatanDiklat
 * @property TrefKabupaten $kotaKegiatanDiklat
 */
class TransKegiatanDiklat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_kegiatan_diklat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaKegiatanDiklat', 'JenisDiklat', 'LamaDiklat', 'JadwalDiklat'], 'required'],
            [['JenisDiklat', 'LamaDiklat', 'NegaraKegiatanDiklat', 'KotaKegiatanDiklat'], 'integer'],
            [['JadwalDiklat'], 'safe'],
            [['NamaKegiatanDiklat', 'PenyelenggaraDiklat', 'LokasiKegiatanDiklat'], 'string', 'max' => 100],
            [['NegaraKegiatanDiklat'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['NegaraKegiatanDiklat' => 'IdNegara']],
            [['KotaKegiatanDiklat'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKabupaten::className(), 'targetAttribute' => ['KotaKegiatanDiklat' => 'IdKabupaten']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKegiatanDiklat' => 'Id Kegiatan Diklat',
            'NamaKegiatanDiklat' => 'Nama Kegiatan Diklat',
            'JenisDiklat' => 'Jenis Diklat',
            'LamaDiklat' => 'Lama Diklat',
            'JadwalDiklat' => 'Jadwal Diklat',
            'PenyelenggaraDiklat' => 'Penyelenggara Diklat',
            'LokasiKegiatanDiklat' => 'Lokasi Kegiatan Diklat',
            'NegaraKegiatanDiklat' => 'Negara Kegiatan Diklat',
            'KotaKegiatanDiklat' => 'Kota Kegiatan Diklat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegaraKegiatanDiklat()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'NegaraKegiatanDiklat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKotaKegiatanDiklat()
    {
        return $this->hasOne(TrefKabupaten::className(), ['IdKabupaten' => 'KotaKegiatanDiklat']);
    }
}
