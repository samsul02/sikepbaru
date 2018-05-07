<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tref_hukuman_disiplin".
 *
 * @property int $IdHukumanDisiplin
 * @property string $NamaHukumanDisiplin
 * @property string $TingkatHukumanDisiplin
 *
 * @property TransRiwayatSanksi[] $transRiwayatSanksi
 */
class TrefHukumanDisiplin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tref_hukuman_disiplin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NamaHukumanDisiplin', 'TingkatHukumanDisiplin'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdHukumanDisiplin' => 'Id Hukuman Disiplin',
            'NamaHukumanDisiplin' => 'Nama Hukuman Disiplin',
            'TingkatHukumanDisiplin' => 'Tingkat Hukuman Disiplin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransRiwayatSanksi()
    {
        return $this->hasMany(TransRiwayatSanksi::className(), ['IdJenisHukumanDisiplin' => 'IdHukumanDisiplin']);
    }
}
