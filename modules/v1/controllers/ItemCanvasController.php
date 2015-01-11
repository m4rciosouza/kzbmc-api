<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ItemCanvas;
use app\modules\v1\models\ProjetoCanvas;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;
use app\modules\v1\models\ProjetoCanvasCompartilhado;

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
				'authenticator' => [
						'class' => HttpJwtAuth::className(),
				]
		];
	}
	
	public function actionBuscarPorIdProjetoCanvas($id, $email)
	{
		$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
		$modoLeitura = $this->possuiProjetoCompartilhado($id, $usuario->id);
		$projetoCanvas = $this->validarAcessoProjetoCanvas($id, $usuario->id, $modoLeitura);		
		
		$itensCanvas = ItemCanvas::findAll(['id_projeto_canvas' => (int) $id]);
		$itens = $this->getItensCanvasFormatados($itensCanvas);
		return [
				'projeto' => $projetoCanvas, 
				'itens' => $itens,
				'modoLeitura' => $modoLeitura
			];
	}

	/**
	 * Valida e retorna um projeto canvas caso o usuário tenha acesso a ele,
	 * sendo de sua própria autoria ou compartilhado.
	 * 
	 * @param integer $projetoCanvasId
	 * @param integer $usuarioId
	 * @param boolean $modoLeitura
	 * @throws UnauthorizedHttpException
	 * @return ProjetoCanvas
	 */
	private function validarAcessoProjetoCanvas($projetoCanvasId, $usuarioId, $modoLeitura)
	{
		if($modoLeitura) {
			$projetoCanvas = ProjetoCanvas::findOne($projetoCanvasId);
		}
		else {
			$condition = ['id' => $projetoCanvasId, 'id_usuario' => $usuarioId];
			$projetoCanvas = ProjetoCanvas::findOne($condition);
		}
		
		if(!$projetoCanvas) {
			throw new UnauthorizedHttpException('Access denied', 403);
		}
		
		return $projetoCanvas;
	}
	
	/**
	 * Verifica se o projeto informado é compartilhado, ou seja, foi 
	 * apenas atribuído como modo de leitura por outro usuário.
	 * 
	 * @param integer $projetoCanvasId
	 * @param integer $usuarioId
	 * @return boolean
	 */
	private function possuiProjetoCompartilhado($projetoCanvasId, $usuarioId)
	{
		$condition = ['id_projeto_canvas' => $projetoCanvasId, 'id_usuario' => $usuarioId];
		$projetoCanvasCompartilhado = ProjetoCanvasCompartilhado::findOne($condition);
		
		return $projetoCanvasCompartilhado ? true : false;
	}
	
	/**
	 * Formata e retorna os itens de um canvas no formato utilizado pelo app
	 * frontend para exibir os dados na tela.
	 * 
	 * @param array $itensCanvas de ItemCanvas
	 * @return array formatado no formato {tipo:[{id, titulo, descricao, cor}]}
	 */
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