<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_nama_table".
 *
 * @property int $idTable
 * @property string $NamaTable
 *
 * @property TransAuditTrail[] $transAuditTrail
 */
class TrefNamaTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_nama_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaTable'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTable' => 'Id Table',
            'NamaTable' => 'Nama Table',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAuditTrail()
    {
        return $this->hasMany(TransAuditTrail::className(), ['IdTable' => 'idTable']);
    }
}
