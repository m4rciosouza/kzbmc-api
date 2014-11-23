<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjetoCanvas;

/**
 * ProjetoCanvasSearch represents the model behind the search form about `app\models\ProjetoCanvas`.
 */
class ProjetoCanvasSearch extends ProjetoCanvas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_usuario'], 'integer'],
            [['nome', 'descricao', 'ativo', 'data_criacao'], 'safe'],
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
        $query = ProjetoCanvas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_usuario' => $this->id_usuario,
            'data_criacao' => $this->data_criacao,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'ativo', $this->ativo]);

        return $dataProvider;
    }
}
