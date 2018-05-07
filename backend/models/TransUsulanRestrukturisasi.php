<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_restrukturisasi".
 *
 * @property int $IdUsulanRestrukturasi
 * @property int $IdSatker
 * @property string $NamaSatker
 * @property string $TMTUsulanSatker
 * @property string $PejabatSatker
 *
 * @property TmstSatker $satker
 */
class TransUsulanRestrukturisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_restrukturisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdSatker', 'NamaSatker', 'TMTUsulanSatker', 'PejabatSatker'], 'required'],
            [['IdSatker'], 'integer'],
            [['TMTUsulanSatker'], 'safe'],
            [['NamaSatker'], 'string', 'max' => 100],
            [['PejabatSatker'], 'string', 'max' => 255],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanRestrukturasi' => 'Id Usulan Restrukturasi',
            'IdSatker' => 'Id Satker',
            'NamaSatker' => 'Nama Satker',
            'TMTUsulanSatker' => 'Tmtusulan Satker',
            'PejabatSatker' => 'Pejabat Satker',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatker']);
    }
}
