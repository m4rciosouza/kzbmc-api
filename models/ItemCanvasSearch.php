<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ItemCanvas;

/**
 * ItemCanvasSearch represents the model behind the search form about `app\models\ItemCanvas`.
 */
class ItemCanvasSearch extends ItemCanvas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_projeto_canvas'], 'integer'],
            [['tipo', 'titulo', 'descricao', 'cor', 'data_criacao'], 'safe'],
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
        $query = ItemCanvas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_projeto_canvas' => $this->id_projeto_canvas,
            'data_criacao' => $this->data_criacao,
        ]);

        $query->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'cor', $this->cor]);

        return $dataProvider;
    }
}
