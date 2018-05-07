<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TmstKeluarga;

/**
 * TmstKeluargaSearch represents the model behind the search form of `backend\models\TmstKeluarga`.
 */
class TmstKeluargaSearch extends TmstKeluarga
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdAnggotaKeluarga', 'IDPegawai', 'JenisHubunganKeluarga', 'PekerjaanAnggotaKeluarga', 'NoIndukPegawaiKeluarga', 'Agama', 'StatusPerkawinan', 'PendidikanTerakhir'], 'integer'],
            [['JenisKelamin', 'NamaAnggotaKeluarga', 'TempatLahirAnggotaKeluarga', 'TanggalLahirAnggotaKeluarga', 'AlamatKantorAnggotaKeluarga', 'TanggalNikah', 'StatusKesehatan', 'IsHidup', 'BerhakTunjangan', 'DokumenHubunganKeluarga', 'NomorKARIS_KARSU', 'FotoAnggotaKeluarga'], 'safe'],
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
        $query = TmstKeluarga::find();

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
            'IdAnggotaKeluarga' => $this->IdAnggotaKeluarga,
            'IDPegawai' => $this->IDPegawai,
            'JenisHubunganKeluarga' => $this->JenisHubunganKeluarga,
            'TanggalLahirAnggotaKeluarga' => $this->TanggalLahirAnggotaKeluarga,
            'PekerjaanAnggotaKeluarga' => $this->PekerjaanAnggotaKeluarga,
            'NoIndukPegawaiKeluarga' => $this->NoIndukPegawaiKeluarga,
            'Agama' => $this->Agama,
            'StatusPerkawinan' => $this->StatusPerkawinan,
            'TanggalNikah' => $this->TanggalNikah,
            'PendidikanTerakhir' => $this->PendidikanTerakhir,
        ]);

        $query->andFilterWhere(['like', 'JenisKelamin', $this->JenisKelamin])
            ->andFilterWhere(['like', 'NamaAnggotaKeluarga', $this->NamaAnggotaKeluarga])
            ->andFilterWhere(['like', 'TempatLahirAnggotaKeluarga', $this->TempatLahirAnggotaKeluarga])
            ->andFilterWhere(['like', 'AlamatKantorAnggotaKeluarga', $this->AlamatKantorAnggotaKeluarga])
            ->andFilterWhere(['like', 'StatusKesehatan', $this->StatusKesehatan])
            ->andFilterWhere(['like', 'IsHidup', $this->IsHidup])
            ->andFilterWhere(['like', 'BerhakTunjangan', $this->BerhakTunjangan])
            ->andFilterWhere(['like', 'DokumenHubunganKeluarga', $this->DokumenHubunganKeluarga])
            ->andFilterWhere(['like', 'NomorKARIS_KARSU', $this->NomorKARIS_KARSU])
            ->andFilterWhere(['like', 'FotoAnggotaKeluarga', $this->FotoAnggotaKeluarga]);

        return $dataProvider;
    }
}
