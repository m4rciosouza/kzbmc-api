<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ItemCanvasLean;
use app\modules\v1\models\ProjetoCanvasLean;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;
use app\modules\v1\models\ProjetoCanvasCompartilhadoLean;

class ItemCanvasLeanController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ItemCanvasLean';
	
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
	
	public function actionBuscarPorIdProjetoCanvas($id)
	{
		$modoLeitura = $this->possuiProjetoCompartilhado($id);
		$projetoCanvas = $this->validarAcessoProjetoCanvas($id, $modoLeitura);
		
		$itensCanvas = ItemCanvasLean::findAll(['id_projeto_canvas' => (int) $id]);
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
	 * @param boolean $modoLeitura
	 * @throws UnauthorizedHttpException
	 * @return ProjetoCanvas
	 */
	private function validarAcessoProjetoCanvas($projetoCanvasId, $modoLeitura)
	{
		// modo leitura nao valida o usuario
		$projetoCanvas = ProjetoCanvasLean::findOne($projetoCanvasId, !$modoLeitura);
		
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
	 * @return boolean
	 */
	private function possuiProjetoCompartilhado($projetoCanvasId)
	{
		$email = Usuario::getRequestedEmail();
		$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
		
		$condition = ['id_projeto_canvas' => $projetoCanvasId, 'id_usuario' => $usuario->id];
		$projetoCanvasCompartilhado = ProjetoCanvasCompartilhadoLean::findOne($condition);
		
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
				ItemCanvasLean::PARCEIROS_CHAVE => [],
				ItemCanvasLean::ATIVIDADES_CHAVE => [],
				ItemCanvasLean::RECURSOS_CHAVE => [],
				ItemCanvasLean::PROPOSTAS_VALOR => [],
				ItemCanvasLean::RELACIONAMENTO_CLIENTES => [],
				ItemCanvasLean::CANAIS => [],
				ItemCanvasLean::SEGMENTOS_CLIENTES => [],
				ItemCanvasLean::ESTRUTURA_CUSTO => [],
				ItemCanvasLean::FLUXO_RECEITA => []
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