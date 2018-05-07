<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_universitas".
 *
 * @property int $IdUniversitas
 * @property int $IdNegara
 * @property string $KodeUniversitas
 * @property string $NamaUniversitas
 * @property string $DeskripsiUniversitas
 * @property string $SingkatanUniversitas
 *
 * @property TransIzinBelajar[] $transIzinBelajar
 * @property TransRiwayatPendidikan[] $transRiwayatPendidikan
 * @property TransRiwayatTugasBelajar[] $transRiwayatTugasBelajar
 * @property TrefNegara $negara
 */
class TrefUniversitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_universitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdNegara', 'KodeUniversitas', 'NamaUniversitas'], 'required'],
            [['IdNegara'], 'integer'],
            [['KodeUniversitas'], 'string', 'max' => 4],
            [['NamaUniversitas'], 'string', 'max' => 100],
            [['DeskripsiUniversitas'], 'string', 'max' => 150],
            [['SingkatanUniversitas'], 'string', 'max' => 50],
            [['IdNegara'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNegara::className(), 'targetAttribute' => ['IdNegara' => 'IdNegara']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUniversitas' => 'Id Universitas',
            'IdNegara' => 'Id Negara',
            'KodeUniversitas' => 'Kode Universitas',
            'NamaUniversitas' => 'Nama Universitas',
            'DeskripsiUniversitas' => 'Deskripsi Universitas',
            'SingkatanUniversitas' => 'Singkatan Universitas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransIzinBelajar()
    {
        return $this->hasMany(TransIzinBelajar::className(), ['IdUniversitas' => 'IdUniversitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatPendidikan()
    {
        return $this->hasMany(TransRiwayatPendidikan::className(), ['IdUniversitas' => 'IdUniversitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatTugasBelajar()
    {
        return $this->hasMany(TransRiwayatTugasBelajar::className(), ['IdUniversitas' => 'IdUniversitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNegara()
    {
        return $this->hasOne(TrefNegara::className(), ['IdNegara' => 'IdNegara']);
    }
}
