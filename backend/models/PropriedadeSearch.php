<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Propriedade;

/**
 * PropriedadeSearch represents the model behind the search form of `app\models\Propriedade`.
 */
class PropriedadeSearch extends Propriedade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'area', 'preco', 'quarto', 'garragem', 'banheiro', 'cozinha', 'sala'], 'integer'],
            [['nomePt', 'nomeEn', 'nomeFr', 'ilha', 'zona', 'proposito', 'descricaoPt', 'descricaoEn', 'descricaoFr', 'created_at', 'updated_at'], 'safe'],
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
        $query = Propriedade::find();

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
            'id' => $this->id,
            'area' => $this->area,
            'preco' => $this->preco,
            'quarto' => $this->quarto,
            'garragem' => $this->garragem,
            'banheiro' => $this->banheiro,
            'cozinha' => $this->cozinha,
            'sala' => $this->sala,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nomePt', $this->nomePt])
            ->andFilterWhere(['like', 'nomeEn', $this->nomeEn])
            ->andFilterWhere(['like', 'nomeFr', $this->nomeFr])
            ->andFilterWhere(['like', 'ilha', $this->ilha])
            ->andFilterWhere(['like', 'zona', $this->zona])
            ->andFilterWhere(['like', 'proposito', $this->proposito])
            ->andFilterWhere(['like', 'descricaoPt', $this->descricaoPt])
            ->andFilterWhere(['like', 'descricaoEn', $this->descricaoEn])
            ->andFilterWhere(['like', 'descricaoFr', $this->descricaoFr]);

        return $dataProvider;
    }
}
