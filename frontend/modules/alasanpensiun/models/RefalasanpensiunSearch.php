<?php

namespace frontend\modules\alasanpensiun\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\alasanpensiun\models\Refalasanpensiun;

/**
 * RefalasanpensiunSearch represents the model behind the search form of `frontend\modules\alasanpensiun\models\Refalasanpensiun`.
 */
class RefalasanpensiunSearch extends Refalasanpensiun
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAlasanPensiun'], 'integer'],
            [['AlasanPensiun', 'Keterangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Refalasanpensiun::find();

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
            'idAlasanPensiun' => $this->idAlasanPensiun,
        ]);

        $query->andFilterWhere(['like', 'AlasanPensiun', $this->AlasanPensiun])
            ->andFilterWhere(['like', 'Keterangan', $this->Keterangan]);

        return $dataProvider;
    }
}
