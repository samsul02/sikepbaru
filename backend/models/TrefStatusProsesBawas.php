<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_status_proses_bawas".
 *
 * @property int $IdProsesBawas
 * @property string $StatusProsesBawas
 *
 * @property TransRiwayatSanksi[] $transRiwayatSanksi
 */
class TrefStatusProsesBawas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_status_proses_bawas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StatusProsesBawas'], 'required'],
            [['StatusProsesBawas'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdProsesBawas' => 'Id Proses Bawas',
            'StatusProsesBawas' => 'Status Proses Bawas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSanksi()
    {
        return $this->hasMany(TransRiwayatSanksi::className(), ['StatusProsesBawas' => 'IdProsesBawas']);
    }
}
