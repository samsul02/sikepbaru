<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TmstPegawai;

/**
 * TmstPegawaiSearch represents the model behind the search form of `backend\models\TmstPegawai`.
 * 
 * note:
 * Tutorial search dari tabel relasinya :
 * http://indocoder.com/tutorial-yii2-framework/tutorial-yii2-bagian-11-search-dari-tabel-yang-berelasi/
 * 
 * Tutorial pencarian global
 * http://indocoder.com/tutorial-yii2-framework/tutorial-yii2-bagian-32-pencarian-global/
 * 
 */
class TmstPegawaiSearch extends TmstPegawai {

    public $globalSearch;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['IdPegawai', 'KodeGolonganRuang', 'StatusPerkawinan', 'JenisPegawai', 'StatusPegawai', 'Agama', 'KabupatenTempatLahir', 'PropinsiTempatLahir', 'GolonganDarah', 'TinggiBadan', 'BeratBadan', 'Rambut', 'WarnaKulit', 'BentukMuka', 'IdSukuBangsa', /* 'IdJabatan', */ 'KodeBankPegawai'], 'integer'],
            [['globalSearch', 'IdJabatan', 'NIPLama', 'NIPBaru', 'NIK', 'NamaLengkap', 'GelarDepan', 'GelarBelakang', 'EmailPegawai', 'NomorHandphone', 'NomorTelepon', 'TanggalLahir', 'JenisKelamin', 'CiriKhusus', 'CacatTubuh', 'DokumenAktaLahir', 'KegemaranHobi', 'MasaKerja', 'FotoPegawai', 'NomorRekeningPegawai', 'CabangRekeningPegawai', 'NamaRekeningPegawai', 'FingerprintPegawai'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = TmstPegawai::find();

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

        $query->joinWith('jabatan');

        $query->orFilterWhere([
            'IdPegawai' => $this->globalSearch,
            'KodeGolonganRuang' => $this->globalSearch,
            'StatusPerkawinan' => $this->globalSearch,
            'JenisPegawai' => $this->globalSearch,
            'StatusPegawai' => $this->globalSearch,
            'Agama' => $this->globalSearch,
            'TanggalLahir' => $this->globalSearch,
            'KabupatenTempatLahir' => $this->globalSearch,
            'PropinsiTempatLahir' => $this->globalSearch,
            'GolonganDarah' => $this->globalSearch,
            'TinggiBadan' => $this->globalSearch,
            'BeratBadan' => $this->globalSearch,
            'Rambut' => $this->globalSearch,
            'WarnaKulit' => $this->globalSearch,
            'BentukMuka' => $this->globalSearch,
            'IdSukuBangsa' => $this->globalSearch,
            //'IdJabatan' => $this->globalSearch,
            'KodeBankPegawai' => $this->globalSearch,
        ]);

        $query->orFilterWhere(['like', 'tref_jabatan.KeteranganNamaJabatan', $this->globalSearch])
                ->orFilterWhere(['like', 'NIPLama', $this->globalSearch])
                ->orFilterWhere(['like', 'NIPBaru', $this->globalSearch])
                ->orFilterWhere(['like', 'NIK', $this->globalSearch])
                ->orFilterWhere(['like', 'NamaLengkap', $this->globalSearch])
                ->orFilterWhere(['like', 'GelarDepan', $this->globalSearch])
                ->orFilterWhere(['like', 'GelarBelakang', $this->globalSearch])
                ->orFilterWhere(['like', 'EmailPegawai', $this->globalSearch])
                ->orFilterWhere(['like', 'NomorHandphone', $this->globalSearch])
                ->orFilterWhere(['like', 'NomorTelepon', $this->globalSearch])
                ->orFilterWhere(['like', 'JenisKelamin', $this->globalSearch])
                ->orFilterWhere(['like', 'CiriKhusus', $this->globalSearch])
                ->orFilterWhere(['like', 'CacatTubuh', $this->globalSearch])
                ->orFilterWhere(['like', 'DokumenAktaLahir', $this->globalSearch])
                ->orFilterWhere(['like', 'KegemaranHobi', $this->globalSearch])
                ->orFilterWhere(['like', 'MasaKerja', $this->globalSearch])
                ->orFilterWhere(['like', 'FotoPegawai', $this->globalSearch])
                ->orFilterWhere(['like', 'NomorRekeningPegawai', $this->globalSearch])
                ->orFilterWhere(['like', 'CabangRekeningPegawai', $this->globalSearch])
                ->orFilterWhere(['like', 'NamaRekeningPegawai', $this->globalSearch])
                ->orFilterWhere(['like', 'FingerprintPegawai', $this->globalSearch]);

        // grid filtering conditions
//        $query->andFilterWhere([
//            'IdPegawai' => $this->IdPegawai,
//            'KodeGolonganRuang' => $this->KodeGolonganRuang,
//            'StatusPerkawinan' => $this->StatusPerkawinan,
//            'JenisPegawai' => $this->JenisPegawai,
//            'StatusPegawai' => $this->StatusPegawai,
//            'Agama' => $this->Agama,
//            'TanggalLahir' => $this->TanggalLahir,
//            'KabupatenTempatLahir' => $this->KabupatenTempatLahir,
//            'PropinsiTempatLahir' => $this->PropinsiTempatLahir,
//            'GolonganDarah' => $this->GolonganDarah,
//            'TinggiBadan' => $this->TinggiBadan,
//            'BeratBadan' => $this->BeratBadan,
//            'Rambut' => $this->Rambut,
//            'WarnaKulit' => $this->WarnaKulit,
//            'BentukMuka' => $this->BentukMuka,
//            'IdSukuBangsa' => $this->IdSukuBangsa,
//            //'IdJabatan' => $this->IdJabatan,
//            'KodeBankPegawai' => $this->KodeBankPegawai,
//        ]);
//
//        $query->andFilterWhere(['like', 'tref_jabatan.KeteranganNamaJabatan', $this->IdJabatan])
//                ->andFilterWhere(['like', 'NIPLama', $this->NIPLama])
//                ->andFilterWhere(['like', 'NIPBaru', $this->NIPBaru])
//                ->andFilterWhere(['like', 'NIK', $this->NIK])
//                ->andFilterWhere(['like', 'NamaLengkap', $this->NamaLengkap])
//                ->andFilterWhere(['like', 'GelarDepan', $this->GelarDepan])
//                ->andFilterWhere(['like', 'GelarBelakang', $this->GelarBelakang])
//                ->andFilterWhere(['like', 'EmailPegawai', $this->EmailPegawai])
//                ->andFilterWhere(['like', 'NomorHandphone', $this->NomorHandphone])
//                ->andFilterWhere(['like', 'NomorTelepon', $this->NomorTelepon])
//                ->andFilterWhere(['like', 'JenisKelamin', $this->JenisKelamin])
//                ->andFilterWhere(['like', 'CiriKhusus', $this->CiriKhusus])
//                ->andFilterWhere(['like', 'CacatTubuh', $this->CacatTubuh])
//                ->andFilterWhere(['like', 'DokumenAktaLahir', $this->DokumenAktaLahir])
//                ->andFilterWhere(['like', 'KegemaranHobi', $this->KegemaranHobi])
//                ->andFilterWhere(['like', 'MasaKerja', $this->MasaKerja])
//                ->andFilterWhere(['like', 'FotoPegawai', $this->FotoPegawai])
//                ->andFilterWhere(['like', 'NomorRekeningPegawai', $this->NomorRekeningPegawai])
//                ->andFilterWhere(['like', 'CabangRekeningPegawai', $this->CabangRekeningPegawai])
//                ->andFilterWhere(['like', 'NamaRekeningPegawai', $this->NamaRekeningPegawai])
//                ->andFilterWhere(['like', 'FingerprintPegawai', $this->FingerprintPegawai]);

        return $dataProvider;
    }

}
