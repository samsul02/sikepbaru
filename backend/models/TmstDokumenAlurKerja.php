<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_dokumen_alur_kerja".
 *
 * @property int $IdDokumenAlurKerja
 * @property string $NamaDokumenAlurKerja
 * @property int $DokumenAlurKerja
 */
class TmstDokumenAlurKerja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_dokumen_alur_kerja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaDokumenAlurKerja', 'DokumenAlurKerja'], 'required'],
            [['DokumenAlurKerja'], 'integer'],
            [['NamaDokumenAlurKerja'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdDokumenAlurKerja' => 'Id Dokumen Alur Kerja',
            'NamaDokumenAlurKerja' => 'Nama Dokumen Alur Kerja',
            'DokumenAlurKerja' => 'Dokumen Alur Kerja',
        ];
    }
}
