<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "trans_forum_detail".
 *
 * @property int $IdForumDetail
 * @property int $IdForum
 * @property string $ContentForum
 * @property int $IdSatkerForumDetail
 * @property string $SatkerForumDetail
 * @property int $IdPegawaiPembuatForum
 * @property string $JawabanThread
 * @property string $StatusReplier
 * @property string $FotoDetailForum
 * @property string $StatusDetailForum
 * @property int $IdGroupForum
 *
 * @property TmstPegawai $pegawaiPembuatForum
 * @property TmstSatker $satkerForumDetail
 * @property TransForum $forum
 */
class TransForumDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans_forum_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IdForum', 'ContentForum', 'StatusDetailForum'], 'required'],
            [['IdForum', 'IdSatkerForumDetail', 'IdPegawaiPembuatForum', 'IdGroupForum'], 'integer'],
            [['ContentForum', 'StatusDetailForum'], 'string'],
            [['SatkerForumDetail'], 'string', 'max' => 200],
            [['JawabanThread'], 'string', 'max' => 100],
            [['StatusReplier'], 'string', 'max' => 150],
            [['FotoDetailForum'], 'string', 'max' => 50],
            [['IdPegawaiPembuatForum'], 'exist', 'skipOnError' => true, 'targetClass' => TmstPegawai::className(), 'targetAttribute' => ['IdPegawaiPembuatForum' => 'IdPegawai']],
            [['IdSatkerForumDetail'], 'exist', 'skipOnError' => true, 'targetClass' => TmstSatker::className(), 'targetAttribute' => ['IdSatkerForumDetail' => 'IdSatker']],
            [['IdForum'], 'exist', 'skipOnError' => true, 'targetClass' => TransForum::className(), 'targetAttribute' => ['IdForum' => 'IdForum']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdForumDetail' => 'Id Forum Detail',
            'IdForum' => 'Id Forum',
            'ContentForum' => 'Content Forum',
            'IdSatkerForumDetail' => 'Id Satker Forum Detail',
            'SatkerForumDetail' => 'Satker Forum Detail',
            'IdPegawaiPembuatForum' => 'Id Pegawai Pembuat Forum',
            'JawabanThread' => 'Jawaban Thread',
            'StatusReplier' => 'Status Replier',
            'FotoDetailForum' => 'Foto Detail Forum',
            'StatusDetailForum' => 'Status Detail Forum',
            'IdGroupForum' => 'Id Group Forum',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawaiPembuatForum()
    {
        return $this->hasOne(TmstPegawai::className(), ['IdPegawai' => 'IdPegawaiPembuatForum']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatkerForumDetail()
    {
        return $this->hasOne(TmstSatker::className(), ['IdSatker' => 'IdSatkerForumDetail']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForum()
    {
        return $this->hasOne(TransForum::className(), ['IdForum' => 'IdForum']);
    }
}
