<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tmst_role".
 *
 * @property int $IdRole
 * @property string $DeskripsiRole
 * @property int $Modul
 * @property int $Akses
 */
class TmstRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmst_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DeskripsiRole', 'Modul', 'Akses'], 'required'],
            [['Modul', 'Akses'], 'integer'],
            [['DeskripsiRole'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdRole' => 'Id Role',
            'DeskripsiRole' => 'Deskripsi Role',
            'Modul' => 'Modul',
            'Akses' => 'Akses',
        ];
    }
}
