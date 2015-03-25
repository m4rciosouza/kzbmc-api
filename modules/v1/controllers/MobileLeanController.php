<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvasLean;
use app\modules\v1\models\Usuario;
use Yii;
use app\modules\v1\models\ItemCanvasLean;
use yii\web\UnauthorizedHttpException;
use yii\web\HttpException;

class MobileLeanController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvasLean';
	
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
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['create'], $actions['update'], $actions['view'], $actions['delete'], $actions['index']);
		return $actions;
	}
	
	/**
	 * Retorna os dados de um projeto, assim como a listagem de itens.
	 * 
	 * @param integer id
	 */
	public function actionListarProjeto($id)
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
	
		$usuario = $this->validateUsuario();
		
		$projetoCanvas = ProjetoCanvasLean::findOne($id);
		if(!$projetoCanvas) {
			throw new \Exception('Project canvas not found', 400);
		}
		
		return ['projeto' => $projetoCanvas, 'itens' => $projetoCanvas->getItens()];
	}
	
	/**
	 * Recebe do dispositivo movel os dados dos projetos canvas a 
	 * serem gravados no sistema.
	 */
	public function actionSincronizarServidor()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		
		$usuario = $this->validateUsuario();
		$transaction = \Yii::$app->db->beginTransaction();
		
		try {
			$projetoCanvas = $this->salvarProjetoCanvas($usuario->email);
			$this->salvarItensCanvas($projetoCanvas->id);
			$transaction->commit();
			return ['projeto' => $projetoCanvas, 'itens' => $projetoCanvas->getItens()];
		}
		catch(\Exception $e) {
			$transaction->rollBack();
			throw new HttpException(500, $e->getMessage());
		}
	}
	
	/**
	 * Remove todos os itens canvas de um projeto e efetua a gravação novamente.
	 * 
	 * @param integer $projetoCanvasId
	 * @throws \Exception
	 */
	private function salvarItensCanvas($projetoCanvasId)
	{
		ItemCanvasLean::deleteAll(['id_projeto_canvas' => $projetoCanvasId]);
		
		$itensCanvas = Yii::$app->getRequest()->getBodyParam('itens');
		
		if($itensCanvas && count($itensCanvas) > 0) {
			foreach($itensCanvas as $tipo=>$itens) {
				foreach($itens as $item) {
					$itemCanvas = new ItemCanvasLean();
					$itemCanvas->id_projeto_canvas = $projetoCanvasId;
					$itemCanvas->tipo = $tipo;
					$itemCanvas->titulo = $item['titulo'];
					$itemCanvas->descricao = $item['descricao'];
					$itemCanvas->cor = $item['cor'];
					
					if(is_numeric($item['id'])) {
						$itemCanvas->id = $item['id'];
					}
					
					if(!$itemCanvas->save()) {
						throw new \Exception('Error saving item canvas', 500);
					}
				}
			}
		}
	}
	
	/**
	 * Cria ou atualiza os dados de um projeto canvas.
	 * 
	 * @param string $email
	 * @throws \Exception
	 * @return \app\modules\v1\models\ProjetoCanvasLean
	 */
	private function salvarProjetoCanvas($email)
	{
		$projetoCanvasId = Yii::$app->getRequest()->getBodyParam('id');
		$projetoCanvas = new ProjetoCanvasLean();
			
		if(is_numeric($projetoCanvasId)) {
			$projetoCanvas = ProjetoCanvasLean::findOne($projetoCanvasId);
			if(!$projetoCanvas) {
				throw new \Exception('Project canvas not found', 400);
			}
		}

		$projetoCanvas->load(Yii::$app->getRequest()->getBodyParams(), '');
		$projetoCanvas->email = $email;
		$projetoCanvas->ativo = ProjetoCanvasLean::ATIVO;
		if(!$projetoCanvas->save()) {
			throw new \Exception('Error saving project canvas', 500);
		}
		
		return $projetoCanvas;
	}
	
	/**
	 * Lista e envia para o dispositivo movel todos os modelo 
	 * canvas do usuario.
	 * 
	 * @return array projetos canvas com seus respectivos itens
	 */
	public function actionSincronizarCliente()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		$usuario = $this->validateUsuario();
		$idsExistentes = $this->getIdsExistentes();
		$this->processarIdsExcluir($usuario->id);
		
		$condition = ['ativo' => ProjetoCanvasLean::ATIVO, 'id_usuario' => $usuario->id];
		$projetosCanvas = ProjetoCanvasLean::find()
							->where(['NOT IN', 'id', $idsExistentes])
							->andWhere($condition)
							->all();
		$projetosCanvasArr = [];
		if(count($projetosCanvas)) {
			foreach($projetosCanvas as $projetoCanvas) {
				$projetosCanvasArr[] = [
						'id' => $projetoCanvas->id,
						'nome' => $projetoCanvas->nome,
						'descricao' => $projetoCanvas->descricao,
						'itens' => $projetoCanvas->getItens()
				];
			}
		}
		
		return $projetosCanvasArr;
	}
	
	/**
	 * Remove os projetos marcados para exclusão.
	 * 
	 * @param $idUsuario
	 */
	private function processarIdsExcluir($idUsuario)
	{
		$idsExcluir = Yii::$app->getRequest()->get('idsExcluir');
	
		if($idsExcluir) {
			$arrIdsExcluir = explode(',', $idsExcluir);
			foreach($arrIdsExcluir as $idExcluir) {
				$projetoCanvas = ProjetoCanvasLean::findOne($idExcluir);
				if($projetoCanvas && $projetoCanvas->id_usuario == $idUsuario) {
					ItemCanvasLean::deleteAll(['id_projeto_canvas' => $idExcluir]);
					ProjetoCanvasLean::deleteAll(['id' => $idExcluir]);
				}
			}
		}
	}
	
	/**
	 * Retorna listagem de ids existentes localmente passados por parâmetro.
	 * 
	 * @return array
	 */
	private function getIdsExistentes()
	{
		$idsExistentes = Yii::$app->getRequest()->get('idsExistentes', []);
		
		if(count($idsExistentes) > 0) {
			$idsExistentes = explode(',', $idsExistentes);
		}
		
		return $idsExistentes;
	}
	
	private function validateUsuario()
	{
		$request = Yii::$app->getRequest();
		$email = $request->get('email', $request->getBodyParam('email'));
		$senha = $request->get('senha', $request->getBodyParam('senha'));
		
		$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
		
		if(!$usuario || $usuario->senha != $senha) {
			throw new UnauthorizedHttpException('Bad credentials', 401);
		}
		
		return $usuario;
	}
}