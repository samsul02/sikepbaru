<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_audit_trail".
 *
 * @property int $IdLogAktivitas
 * @property int $IdTable
 * @property string $IdRow
 * @property string $Atribut
 * @property int $IdUser
 * @property string $NewValue
 * @property int $Deleted
 * @property string $Timestamp
 *
 * @property TmstUser $user
 * @property TrefNamaTable $table
 */
class TransAuditTrail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_audit_trail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdTable', 'Atribut', 'IdUser', 'NewValue', 'Deleted'], 'required'],
            [['IdTable', 'IdRow', 'IdUser'], 'integer'],
            [['Timestamp'], 'safe'],
            [['Atribut', 'NewValue'], 'string', 'max' => 200],
            [['Deleted'], 'string', 'max' => 1],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUser::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
            [['IdTable'], 'exist', 'skipOnError' => true, 'targetClass' => TrefNamaTable::className(), 'targetAttribute' => ['IdTable' => 'idTable']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdLogAktivitas' => 'Id Log Aktivitas',
            'IdTable' => 'Id Table',
            'IdRow' => 'Id Row',
            'Atribut' => 'Atribut',
            'IdUser' => 'Id User',
            'NewValue' => 'New Value',
            'Deleted' => 'Deleted',
            'Timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TmstUser::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(TrefNamaTable::className(), ['idTable' => 'IdTable']);
    }
}
