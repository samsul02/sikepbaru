<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TransKegiatanDiklat;

/**
 * TransKegiatanDiklatSearch represents the model behind the search form of `backend\models\TransKegiatanDiklat`.
 */
class TransKegiatanDiklatSearch extends TransKegiatanDiklat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdKegiatanDiklat', 'JenisDiklat', 'LamaDiklat', 'NegaraKegiatanDiklat', 'KotaKegiatanDiklat'], 'integer'],
            [['NamaKegiatanDiklat', 'JadwalDiklat', 'PenyelenggaraDiklat', 'LokasiKegiatanDiklat'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TransKegiatanDiklat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdKegiatanDiklat' => $this->IdKegiatanDiklat,
            'JenisDiklat' => $this->JenisDiklat,
            'LamaDiklat' => $this->LamaDiklat,
            'JadwalDiklat' => $this->JadwalDiklat,
            'NegaraKegiatanDiklat' => $this->NegaraKegiatanDiklat,
            'KotaKegiatanDiklat' => $this->KotaKegiatanDiklat,
        ]);

        $query->andFilterWhere(['like', 'NamaKegiatanDiklat', $this->NamaKegiatanDiklat])
            ->andFilterWhere(['like', 'PenyelenggaraDiklat', $this->PenyelenggaraDiklat])
            ->andFilterWhere(['like', 'LokasiKegiatanDiklat', $this->LokasiKegiatanDiklat]);

        return $dataProvider;
    }
}
