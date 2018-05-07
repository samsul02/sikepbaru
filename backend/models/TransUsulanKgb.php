<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_usulan_kgb".
 *
 * @property int $IdUsulanKGB
 * @property string $JenisUsulanKGB
 * @property int $IdKPPN
 * @property string $TanggalUsulanKGB
 * @property string $NomorRegistrasiUsulanKGB
 * @property string $NamaPejabatUsulanKGB
 * @property string $PejabatUsulanKGB
 * @property int $IdSatkerUsulanKGB
 * @property string $StatusUsulanKGB
 *
 * @property TmstSatker $satkerUsulanKGB
 * @property TrefKppn $kPPN
 */
class TransUsulanKgb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_usulan_kgb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdKPPN', 'IdSatkerUsulanKGB'], 'integer'],
            [['TanggalUsulanKGB'], 'safe'],
            [['StatusUsulanKGB'], 'string'],
            [['JenisUsulanKGB'], 'string', 'max' => 1],
            [['NomorRegistrasiUsulanKGB', 'NamaPejabatUsulanKGB', 'PejabatUsulanKGB'], 'string', 'max' => 100],
            [['IdSatkerUsulanKGB'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerUsulanKGB' => 'IdSatker']],
            [['IdKPPN'], 'exist', 'skipOnError' => true, 'targetClass' => TrefKppn::className(), 'targetAttribute' => ['IdKPPN' => 'IdKPPN']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdUsulanKGB' => 'Id Usulan Kgb',
            'JenisUsulanKGB' => 'Jenis Usulan Kgb',
            'IdKPPN' => 'Id Kppn',
            'TanggalUsulanKGB' => 'Tanggal Usulan Kgb',
            'NomorRegistrasiUsulanKGB' => 'Nomor Registrasi Usulan Kgb',
            'NamaPejabatUsulanKGB' => 'Nama Pejabat Usulan Kgb',
            'PejabatUsulanKGB' => 'Pejabat Usulan Kgb',
            'IdSatkerUsulanKGB' => 'Id Satker Usulan Kgb',
            'StatusUsulanKGB' => 'Status Usulan Kgb',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerUsulanKGB()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerUsulanKGB']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKPPN()
    {
        return $this->hasOne(TrefKppn::className(), ['IdKPPN' => 'IdKPPN']);
    }
}
