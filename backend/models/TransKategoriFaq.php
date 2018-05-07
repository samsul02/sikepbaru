<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_kategori_faq".
 *
 * @property int $IdKategoriFaq
 * @property int $IdFaq
 *
 * @property TransForum[] $transForum
 * @property TransFaq $faq
 */
class TransKategoriFaq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_kategori_faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdFaq'], 'required'],
            [['IdFaq'], 'integer'],
            [['IdFaq'], 'exist', 'skipOnError' => true, 'targetClass' => TransFaq::className(), 'targetAttribute' => ['IdFaq' => 'IdFaq']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdKategoriFaq' => 'Id Kategori Faq',
            'IdFaq' => 'Id Faq',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransForum()
    {
        return $this->hasMany(TransForum::className(), ['IdKategori' => 'IdKategoriFaq']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaq()
    {
        return $this->hasOne(TransFaq::className(), ['IdFaq' => 'IdFaq']);
    }
}
