<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_user".
 *
 * @property int $IdUser
 * @property int $IdPegawai
 * @property string $Username
 * @property string $Password
 * @property int $IdRole
 *
 * @property TmstPegawai $pegawai
 * @property TransAuditTrail[] $transAuditTrail
 */
class TmstUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdPegawai', 'IdRole'], 'integer'],
            [['Username', 'Password'], 'required'],
            [['Username', 'Password'], 'string', 'max' => 50],
            [['IdPegawai'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawai' => 'IdPegawai']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUser' => 'Id User',
            'IdPegawai' => 'Id Pegawai',
            'Username' => 'Username',
            'Password' => 'Password',
            'IdRole' => 'Id Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawai']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransAuditTrail()
    {
        return $this->hasMany(TransAuditTrail::className(), ['IdUser' => 'IdUser']);
    }
}
