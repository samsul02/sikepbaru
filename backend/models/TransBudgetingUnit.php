<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_budgeting_unit".
 *
 * @property int $IdBudgetingUnit
 * @property string $TahunAnggaran
 * @property int $IdUnitKerja
 * @property int $IdSatker
 * @property string $TanggalPengajuan
 * @property string $TanggalDisetujui
 * @property string $PejabatBudgeting
 *
 * @property TmstUnitKerja $unitKerja
 * @property TmstSatker $satker
 */
class TransBudgetingUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_budgeting_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TahunAnggaran', 'IdUnitKerja', 'IdSatker', 'TanggalPengajuan', 'TanggalDisetujui', 'PejabatBudgeting'], 'required'],
            [['TahunAnggaran', 'TanggalPengajuan', 'TanggalDisetujui'], 'safe'],
            [['IdUnitKerja', 'IdSatker'], 'integer'],
            [['PejabatBudgeting'], 'string', 'max' => 250],
            [['IdUnitKerja'], 'exist', 'skipOnError' => true, 'targetClass' => TmstUnitKerja::className(), 'targetAttribute' => ['IdUnitKerja' => 'IdUnitKerja']],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdBudgetingUnit' => 'Id Budgeting Unit',
            'TahunAnggaran' => 'Tahun Anggaran',
            'IdUnitKerja' => 'Id Unit Kerja',
            'IdSatker' => 'Id Satker',
            'TanggalPengajuan' => 'Tanggal Pengajuan',
            'TanggalDisetujui' => 'Tanggal Disetujui',
            'PejabatBudgeting' => 'Pejabat Budgeting',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKerja()
    {
        return $this->hasOne(TmstUnitKerja::className(), ['IdUnitKerja' => 'IdUnitKerja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatker']);
    }
}
