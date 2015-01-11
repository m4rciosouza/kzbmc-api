<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use app\modules\v1\models\Usuario;
use Yii;
use app\modules\v1\models\ItemCanvas;
use yii\web\UnauthorizedHttpException;
use yii\web\HttpException;

class MobileController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvas';
	
	/*public $serializer = [
			'class' => 'yii\rest\Serializer',
			'collectionEnvelope' => 'items',
	];*/
	
	/*public function behaviors()
	{
		return [
				'corsFilter' => [
						'class' => \yii\filters\Cors::className(),
				],
				'authenticator' => [
						'class' => HttpJwtAuth::className(),
				]
		];
	}*/
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['create'], $actions['update'], $actions['view'], $actions['delete'], $actions['index']);
		return $actions;
	}
	
	/**
	 * Recebe do dispositivo movel os dados dos projetos canvas a 
	 * serem gravados no sistema.
	 */
	public function actionSincronizarServidor()
	{
		$usuario = $this->validateUsuario();
		$transaction = \Yii::$app->db->beginTransaction();
		
		try {
			$projetoCanvas = $this->salvarProjetoCanvas($usuario->email);
			$this->salvarItensCanvas($projetoCanvas->id);
			$transaction->commit();
			return $projetoCanvas;
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
		ItemCanvas::deleteAll(['id_projeto_canvas' => $projetoCanvasId]);
		
		$itensCanvas = Yii::$app->request->post('ItemCanvas');
		
		if($itensCanvas && count($itensCanvas) > 0) {
			foreach($itensCanvas as $item) {
				$itemCanvas = new ItemCanvas();
				$itemCanvas->id_projeto_canvas = $projetoCanvasId;
				$itemCanvas->tipo = $item['tipo'];
				$itemCanvas->titulo = $item['titulo'];
				$itemCanvas->descricao = $item['descricao'];
				$itemCanvas->cor = $item['cor'];
				
				if(!$itemCanvas->save()) {
					throw new \Exception('Error saving item canvas', 500);
				}
			}
		}
	}
	
	/**
	 * Cria ou atualiza os dados de um projeto canvas.
	 * 
	 * @param string $email
	 * @throws \Exception
	 * @return \app\modules\v1\models\ProjetoCanvas
	 */
	private function salvarProjetoCanvas($email)
	{
		$projetoCanvasId = Yii::$app->request->post('projeto_canvas_id');
		$projetoCanvas = new ProjetoCanvas();
			
		if($projetoCanvasId) {
			$projetoCanvas = ProjetoCanvas::findOne($projetoCanvasId);
			if(!$projetoCanvas) {
				throw new \Exception('Project canvas not found', 400);
			}
		}

		$projetoCanvas->load(Yii::$app->request->post());
		$projetoCanvas->email = $email;
		
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
		$usuario = $this->validateUsuario();
		
		$condition = ['ativo' => ProjetoCanvas::ATIVO, 'id_usuario' => $usuario->id];
		$projetosCanvas = ProjetoCanvas::findAll($condition);
		
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
	
	private function validateUsuario()
	{
		$email = Yii::$app->request->post('email');
		$senha = Yii::$app->request->post('senha');
		
		$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
		
		if(!$usuario || $usuario->senha != md5($senha)) {
			throw new UnauthorizedHttpException('Bad credentials', 401);
		}
		
		return $usuario;
	}
}