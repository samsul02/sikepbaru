<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_pesan".
 *
 * @property int $IdPesan
 * @property string $JudulPesan
 * @property string $IsiPesan
 * @property int $IdPegawaiPengirim
 * @property int $IdPegawaiPenerima
 *
 * @property TmstPegawai $pegawaiPengirim
 * @property TmstPegawai $pegawaiPenerima
 */
class TransPesan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_pesan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JudulPesan', 'IsiPesan', 'IdPegawaiPengirim', 'IdPegawaiPenerima'], 'required'],
            [['IsiPesan'], 'string'],
            [['IdPegawaiPengirim', 'IdPegawaiPenerima'], 'integer'],
            [['JudulPesan'], 'string', 'max' => 200],
            [['IdPegawaiPengirim'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiPengirim' => 'IdPegawai']],
            [['IdPegawaiPenerima'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiPenerima' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdPesan' => 'Id Pesan',
            'JudulPesan' => 'Judul Pesan',
            'IsiPesan' => 'Isi Pesan',
            'IdPegawaiPengirim' => 'Id Pegawai Pengirim',
            'IdPegawaiPenerima' => 'Id Pegawai Penerima',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawaiPengirim()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiPengirim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawaiPenerima()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiPenerima']);
    }
}
