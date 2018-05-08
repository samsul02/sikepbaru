<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TransRiwayatJabatan;

/**
 * TransRiwayatJabatanSearch represents the model behind the search form of `backend\models\TransRiwayatJabatan`.
 */
class TransRiwayatJabatanSearch extends TransRiwayatJabatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdRiwayatJabatanPegawai', 'IdPegawai', 'IdPegawaiAtasan', 'IdSatker', 'IdNamaJabatan', 'IdStrukturOrganisasi', 'AngkaKredit', 'IdKPPN', 'FlagAktif'], 'integer'],
            [['TMTJabatanMulai', 'TMTJabatanSelesai', 'TMTEselon', 'NomorSK', 'TanggalSK', 'PejabatSK', 'LokasiTASPEN', 'DokumenSK', 'TanggalPelantikan', 'NomorSPP', 'TanggalSPP', 'PejabatSPP', 'DokumenSPP', 'TMTSPMT', 'NomorSPMT', 'TanggalSPMT', 'PejabatSPMT', 'DokumenSPMT', 'LembagaPenerbitSKFungsional', 'FlagDiperbantukandiMA', 'FlagDiperbantukandiLuar', 'FlagAssignment'], 'safe'],
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
        $query = TransRiwayatJabatan::find();

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
            'IdRiwayatJabatanPegawai' => $this->IdRiwayatJabatanPegawai,
            'IdPegawai' => $this->IdPegawai,
            'IdPegawaiAtasan' => $this->IdPegawaiAtasan,
            'IdSatker' => $this->IdSatker,
            'TMTJabatanMulai' => $this->TMTJabatanMulai,
            'TMTJabatanSelesai' => $this->TMTJabatanSelesai,
            'IdNamaJabatan' => $this->IdNamaJabatan,
            'IdStrukturOrganisasi' => $this->IdStrukturOrganisasi,
            'TMTEselon' => $this->TMTEselon,
            'AngkaKredit' => $this->AngkaKredit,
            'TanggalSK' => $this->TanggalSK,
            'IdKPPN' => $this->IdKPPN,
            'TanggalPelantikan' => $this->TanggalPelantikan,
            'TanggalSPP' => $this->TanggalSPP,
            'TMTSPMT' => $this->TMTSPMT,
            'TanggalSPMT' => $this->TanggalSPMT,
            'FlagAktif' => $this->FlagAktif,
        ]);

        $query->andFilterWhere(['like', 'NomorSK', $this->NomorSK])
            ->andFilterWhere(['like', 'PejabatSK', $this->PejabatSK])
            ->andFilterWhere(['like', 'LokasiTASPEN', $this->LokasiTASPEN])
            ->andFilterWhere(['like', 'DokumenSK', $this->DokumenSK])
            ->andFilterWhere(['like', 'NomorSPP', $this->NomorSPP])
            ->andFilterWhere(['like', 'PejabatSPP', $this->PejabatSPP])
            ->andFilterWhere(['like', 'DokumenSPP', $this->DokumenSPP])
            ->andFilterWhere(['like', 'NomorSPMT', $this->NomorSPMT])
            ->andFilterWhere(['like', 'PejabatSPMT', $this->PejabatSPMT])
            ->andFilterWhere(['like', 'DokumenSPMT', $this->DokumenSPMT])
            ->andFilterWhere(['like', 'LembagaPenerbitSKFungsional', $this->LembagaPenerbitSKFungsional])
            ->andFilterWhere(['like', 'FlagDiperbantukandiMA', $this->FlagDiperbantukandiMA])
            ->andFilterWhere(['like', 'FlagDiperbantukandiLuar', $this->FlagDiperbantukandiLuar])
            ->andFilterWhere(['like', 'FlagAssignment', $this->FlagAssignment]);

        return $dataProvider;
    }
}
