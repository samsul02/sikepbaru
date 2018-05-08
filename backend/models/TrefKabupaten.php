<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_kabupaten".
 *
 * @property int $IdKabupaten
 * @property string $NamaKabupaten
 * @property int $IdPropinsi
 *
 * @property TrefKecamatan[] $trefKecamatan
 */
class TrefKabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tref_kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NamaKabupaten'], 'required'],
            [['IdPropinsi'], 'integer'],
            [['NamaKabupaten'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdKabupaten' => 'Id Kabupaten',
            'NamaKabupaten' => 'Nama Kabupaten',
            'IdPropinsi' => 'Id Propinsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefKecamatan()
    {
        return $this->hasMany(TrefKecamatan::className(), ['IdKabupaten' => 'IdKabupaten']);
    }
}
