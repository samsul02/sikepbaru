<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TransRiwayatOrganisasi;

/**
 * TransRiwayatOrganisasiSearch represents the model behind the search form of `backend\models\TransRiwayatOrganisasi`.
 */
class TransRiwayatOrganisasiSearch extends TransRiwayatOrganisasi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdRiwayatOrganisasi', 'IdPegawai', 'IdStatusMasaOrganisasi', 'IdJabatanOrganisasi'], 'integer'],
            [['NamaOrganisasi', 'LokasiOrganisasi', 'TahunMulai', 'TahunSelesai', 'NamaPimpinanOrganisasi', 'KeteranganOrganisasi', 'DokumenOrganisasi'], 'safe'],
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
        $query = TransRiwayatOrganisasi::find();

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
            'IdRiwayatOrganisasi' => $this->IdRiwayatOrganisasi,
            'IdPegawai' => $this->IdPegawai,
            'IdStatusMasaOrganisasi' => $this->IdStatusMasaOrganisasi,
            'IdJabatanOrganisasi' => $this->IdJabatanOrganisasi,
            'TahunMulai' => $this->TahunMulai,
            'TahunSelesai' => $this->TahunSelesai,
        ]);

        $query->andFilterWhere(['like', 'NamaOrganisasi', $this->NamaOrganisasi])
            ->andFilterWhere(['like', 'LokasiOrganisasi', $this->LokasiOrganisasi])
            ->andFilterWhere(['like', 'NamaPimpinanOrganisasi', $this->NamaPimpinanOrganisasi])
            ->andFilterWhere(['like', 'KeteranganOrganisasi', $this->KeteranganOrganisasi])
            ->andFilterWhere(['like', 'DokumenOrganisasi', $this->DokumenOrganisasi]);

        return $dataProvider;
    }
}
