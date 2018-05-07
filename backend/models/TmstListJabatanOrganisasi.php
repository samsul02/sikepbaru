<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_list_jabatan_organisasi".
 *
 * @property int $IdListJabatanOrganisasi
 * @property int $IdStrukturOrganisasi
 * @property int $IdJabatan
 * @property int $ParentJabatanOrganisasi
 * @property int $LevelJabatanOrganisasi
 *
 * @property TmstStrukturOrganisasi $strukturOrganisasi
 * @property TrefJabatan $jabatan
 */
class TmstListJabatanOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_list_jabatan_organisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdStrukturOrganisasi', 'IdJabatan', 'ParentJabatanOrganisasi', 'LevelJabatanOrganisasi'], 'required'],
            [['IdStrukturOrganisasi', 'IdJabatan', 'ParentJabatanOrganisasi', 'LevelJabatanOrganisasi'], 'integer'],
            [['IdStrukturOrganisasi'], 'exist', 'skipOnError' => true, 'targetClass' => TmstStrukturOrganisasi::className(), 'targetAttribute' => ['IdStrukturOrganisasi' => 'IdRefStrukturOrgansasi']],
            [['IdJabatan'], 'exist', 'skipOnError' => true, 'targetClass' => TrefJabatan::className(), 'targetAttribute' => ['IdJabatan' => 'IdNamaJabatan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdListJabatanOrganisasi' => 'Id List Jabatan Organisasi',
            'IdStrukturOrganisasi' => 'Id Struktur Organisasi',
            'IdJabatan' => 'Id Jabatan',
            'ParentJabatanOrganisasi' => 'Parent Jabatan Organisasi',
            'LevelJabatanOrganisasi' => 'Level Jabatan Organisasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrukturOrganisasi()
    {
        return $this->hasOne(TmstStrukturOrganisasi::className(), ['IdRefStrukturOrgansasi' => 'IdStrukturOrganisasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(TrefJabatan::className(), ['IdNamaJabatan' => 'IdJabatan']);
    }
}
