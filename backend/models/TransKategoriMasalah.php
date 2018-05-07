<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_kategori_masalah".
 *
 * @property int $IdKategoriFaq
 * @property string $NamaKategori
 * @property string $DeskripsiKategori
 */
class TransKategoriMasalah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_kategori_masalah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaKategori'], 'required'],
            [['NamaKategori'], 'string', 'max' => 10],
            [['DeskripsiKategori'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKategoriFaq' => 'Id Kategori Faq',
            'NamaKategori' => 'Nama Kategori',
            'DeskripsiKategori' => 'Deskripsi Kategori',
        ];
    }
}
