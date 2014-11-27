<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ItemCanvas;
use app\modules\v1\models\ProjetoCanvas;

class ItemCanvasController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ItemCanvas';
	
	public $serializer = [
			'class' => 'yii\rest\Serializer',
			'collectionEnvelope' => 'items',
	];
	
	public function behaviors()
	{
		return [
				'corsFilter' => [
						'class' => \yii\filters\Cors::className(),
				],
		];
	}
	
	public function actionBuscarPorIdProjetoCanvas($id)
	{
		$projetoCanvas = ProjetoCanvas::findOne((int) $id);
		$itensCanvas = ItemCanvas::findAll(['id_projeto_canvas' => (int) $id]);
		$itens = $this->getItensCanvasFormatados($itensCanvas);
		return [
				'projeto' => $projetoCanvas, 
				'itens' => $itens
			];
	}
	
	private function getItensCanvasFormatados($itensCanvas)
	{
		$itens = [
				ItemCanvas::PARCEIROS_CHAVE => [],
				ItemCanvas::ATIVIDADES_CHAVE => [],
				ItemCanvas::RECURSOS_CHAVE => [],
				ItemCanvas::PROPOSTAS_VALOR => [],
				ItemCanvas::RELACIONAMENTO_CLIENTES => [],
				ItemCanvas::CANAIS => [],
				ItemCanvas::SEGMENTOS_CLIENTES => [],
				ItemCanvas::ESTRUTURA_CUSTO => [],
				ItemCanvas::FLUXO_RECEITA => []
		];
		foreach($itensCanvas as $itemCanvas) {
			$itens[$itemCanvas->tipo][] = [
					'id' => $itemCanvas->id,
					'titulo' => $itemCanvas->titulo,
					'descricao' => $itemCanvas->descricao,
					'cor' => $itemCanvas->cor
			];
		}
		return $itens;
	}
}