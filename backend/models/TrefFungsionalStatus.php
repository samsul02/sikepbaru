<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_fungsional_status".
 *
 * @property int $IdRefFungsionalStatus
 * @property string $NamaRefFungsionalStatus
 *
 * @property TrefFungsionalAlasan[] $trefFungsionalAlasan
 */
class TrefFungsionalStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_fungsional_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaRefFungsionalStatus'], 'required'],
            [['NamaRefFungsionalStatus'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRefFungsionalStatus' => 'Id Ref Fungsional Status',
            'NamaRefFungsionalStatus' => 'Nama Ref Fungsional Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrefFungsionalAlasan()
    {
        return $this->hasMany(TrefFungsionalAlasan::className(), ['IdRefFungsionalStatus' => 'IdRefFungsionalStatus']);
    }
}
