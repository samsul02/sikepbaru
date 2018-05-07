<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_fungsional_alasan".
 *
 * @property int $IdRefFungsionalAlasan
 * @property int $IdRefFungsionalStatus
 * @property string $NamaRefFungsionalAlasan
 *
 * @property TrefFungsionalStatus $refFungsionalStatus
 */
class TrefFungsionalAlasan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_fungsional_alasan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdRefFungsionalStatus', 'NamaRefFungsionalAlasan'], 'required'],
            [['IdRefFungsionalStatus'], 'integer'],
            [['NamaRefFungsionalAlasan'], 'string', 'max' => 30],
            [['IdRefFungsionalStatus'], 'exist', 'skipOnError' => true, 'targetClass' => TrefFungsionalStatus::className(), 'targetAttribute' => ['IdRefFungsionalStatus' => 'IdRefFungsionalStatus']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefFungsionalAlasan' => 'Id Ref Fungsional Alasan',
            'IdRefFungsionalStatus' => 'Id Ref Fungsional Status',
            'NamaRefFungsionalAlasan' => 'Nama Ref Fungsional Alasan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefFungsionalStatus()
    {
        return $this->hasOne(TrefFungsionalStatus::className(), ['IdRefFungsionalStatus' => 'IdRefFungsionalStatus']);
    }
}
