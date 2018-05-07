<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_role_workflow".
 *
 * @property int $IdWorkflow
 * @property string $NamaWorkflow
 * @property int $JumlahTahapanWorkflow
 */
class TransRoleWorkflow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_role_workflow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaWorkflow', 'JumlahTahapanWorkflow'], 'required'],
            [['JumlahTahapanWorkflow'], 'integer'],
            [['NamaWorkflow'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdWorkflow' => 'Id Workflow',
            'NamaWorkflow' => 'Nama Workflow',
            'JumlahTahapanWorkflow' => 'Jumlah Tahapan Workflow',
        ];
    }
}
