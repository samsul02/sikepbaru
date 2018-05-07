<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_forum".
 *
 * @property int $IdForum
 * @property string $TanggalForum
 * @property string $JudulForum
 * @property string $IsiForum
 * @property int $IdKategori
 * @property int $IdSatker
 * @property string $ThreadStarter
 * @property string $Status
 *
 * @property TmstSatker $satker
 * @property TransKategoriFaq $kategori
 * @property TransForumDetail[] $transForumDetail
 */
class TransForum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_forum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TanggalForum', 'IdKategori', 'IdSatker'], 'required'],
            [['TanggalForum'], 'safe'],
            [['IsiForum'], 'string'],
            [['IdKategori', 'IdSatker'], 'integer'],
            [['JudulForum'], 'string', 'max' => 150],
            [['ThreadStarter'], 'string', 'max' => 100],
            [['Status'], 'string', 'max' => 1],
            [['IdSatker'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatker' => 'IdSatker']],
            [['IdKategori'], 'exist', 'skipOnError' => true, 'targetClass' => TransKategoriFaq::className(), 'targetAttribute' => ['IdKategori' => 'IdKategoriFaq']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdForum' => 'Id Forum',
            'TanggalForum' => 'Tanggal Forum',
            'JudulForum' => 'Judul Forum',
            'IsiForum' => 'Isi Forum',
            'IdKategori' => 'Id Kategori',
            'IdSatker' => 'Id Satker',
            'ThreadStarter' => 'Thread Starter',
            'Status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatker()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatker']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(TransKategoriFaq::className(), ['IdKategoriFaq' => 'IdKategori']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransForumDetail()
    {
        return $this->hasMany(TransForumDetail::className(), ['IdForum' => 'IdForum']);
    }
}
