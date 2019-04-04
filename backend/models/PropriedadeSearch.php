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
            [['id', 'id_conselho', 'area', 'proposito', 'quarto', 'garragem', 'banheiro', 'cozinha', 'sala', 'publicar', 'id_tipo', 'destaque'], 'integer'],
            [['zona', 'descricaopt_PT', 'descricaoen_US', 'descricaofr_FR', 'created_at', 'updated_at'], 'safe'],
            [['preco'], 'number'],
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
            'id_conselho' => $this->id_conselho,
            'area' => $this->area,
            'preco' => $this->preco,
            'proposito' => $this->proposito,
            'quarto' => $this->quarto,
            'garragem' => $this->garragem,
            'banheiro' => $this->banheiro,
            'cozinha' => $this->cozinha,
            'sala' => $this->sala,
            'publicar' => $this->publicar,
            'id_tipo' => $this->id_tipo,
            'destaque' => $this->destaque,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'zona', $this->zona])
            ->andFilterWhere(['like', 'descricaopt_PT', $this->descricaopt_PT])
            ->andFilterWhere(['like', 'descricaoen_US', $this->descricaoen_US])
            ->andFilterWhere(['like', 'descricaofr_FR', $this->descricaofr_FR]);

        return $dataProvider;
    }
}
