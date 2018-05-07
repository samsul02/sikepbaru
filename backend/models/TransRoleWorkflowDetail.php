<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_role_workflow_detail".
 *
 * @property int $IdWorkflow
 * @property int $NomorTahapan
 * @property string $NamaTahapan
 * @property int $IdJabatanStruktural
 * @property int $IdJabatanFungsional
 * @property string $Timestamp
 * @property string $Status
 *
 * @property TrefJabatan $jabatanStruktural
 * @property TrefJabatan $jabatanFungsional
 */
class TransRoleWorkflowDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_role_workflow_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NomorTahapan', 'NamaTahapan', 'IdJabatanStruktural', 'IdJabatanFungsional', 'Status'], 'required'],
            [['NomorTahapan', 'IdJabatanStruktural', 'IdJabatanFungsional'], 'integer'],
            [['Timestamp'], 'safe'],
            [['NamaTahapan'], 'string', 'max' => 255],
            [['Status'], 'string', 'max' => 1],
            [['IdJabatanStruktural'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanStruktural' => 'IdNamaJabatan']],
            [['IdJabatanFungsional'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatanFungsional' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdWorkflow' => 'Id Workflow',
            'NomorTahapan' => 'Nomor Tahapan',
            'NamaTahapan' => 'Nama Tahapan',
            'IdJabatanStruktural' => 'Id Jabatan Struktural',
            'IdJabatanFungsional' => 'Id Jabatan Fungsional',
            'Timestamp' => 'Timestamp',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanStruktural()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanStruktural']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanFungsional()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatanFungsional']);
    }
}
