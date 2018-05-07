<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_jenis_pensiun".
 *
 * @property int $idJenisPensiun
 * @property string $JenisPensiun
 *
 * @property TransPensiun[] $transPensiun
 */
class TrefJenisPensiun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_jenis_pensiun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JenisPensiun'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idJenisPensiun' => 'Id Jenis Pensiun',
            'JenisPensiun' => 'Jenis Pensiun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransPensiun()
    {
        return $this->hasMany(TransPensiun::className(), ['JenisPensiun' => 'idJenisPensiun']);
    }
}
