<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjetoCanvasCompartilhado;

/**
 * ProjetoCanvasCompartilhadoSearch represents the model behind the search form about `app\models\ProjetoCanvasCompartilhado`.
 */
class ProjetoCanvasCompartilhadoSearch extends ProjetoCanvasCompartilhado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_projeto_canvas', 'id_usuario'], 'integer'],
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
        $query = ProjetoCanvasCompartilhado::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_projeto_canvas' => $this->id_projeto_canvas,
            'id_usuario' => $this->id_usuario,
        ]);

        return $dataProvider;
    }
}
