<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\ProjetoCanvasCompartilhado;
use app\modules\v1\models\Usuario;
use yii\web\HttpException;
use Yii;
use yii\helpers\VarDumper;

class CompartilhadoController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvasCompartilhado';
	
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
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['create'], $actions['update'], $actions['view'], $actions['delete']);
		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProviderIndex'];
		return $actions;
	}
	
	public function prepareDataProviderIndex()
	{
		$condition = [];
		$email = Usuario::getRequestedEmail();
		if($email !== null) {
			$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
			$condition['id_usuario'] = $usuario ? $usuario->id : -1;
		}
		return new ActiveDataProvider([
				'query' => ProjetoCanvasCompartilhado::find()->where($condition),
		]);
	}
	
	/**
	 * Compartilha um projeto. Executa as seguintes operacoes:
	 * - Verifica se o projeto e valido;
	 * - Verifica se usuario existente, ou cria um novo;
	 * - Cria um projeto canvas compartilhado;
	 * - Envia email com dados de acesso.
	 * 
	 * @throws HttpException
	 * @return \app\modules\v1\models\ProjetoCanvasCompartilhado
	 */
	public function actionCompartilhar()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		
		$idProjetoCanvas = Yii::$app->request->post('idProjetoCanvas');
		$email = Yii::$app->request->post('emailCompartilhar');
		$lingua = Yii::$app->request->post('lingua', Usuario::LINGUA_EN);
		$senha = '';
		
		$projetoCanvas = ProjetoCanvas::findOne(['id' => $idProjetoCanvas]);
		if(!$projetoCanvas) {
			throw new HttpException(400, Yii::t('projeto_canvas_compartilhado', 'Error sharing project'), 400);
		}
		$usuario = Usuario::findOne(['email' => $email]);
		if(!$usuario) {
			$senha = Usuario::gerarSenha();
			$usuario = $this->criarUsuario($email, $lingua, $senha);
		}
		
		$projetoCanvasCompartilhado = $this->criarProjetoCanvasCompartilhado($idProjetoCanvas, $usuario->id);
		Yii::$app->language = $usuario->lingua;
		$this->enviarEmailNotificacao($email, $projetoCanvas->nome, $senha);
		
		return $projetoCanvasCompartilhado;
	}
	
	/**
	 * Envia email de notificacao informando que um novo projeto foi compartilhado.
	 * Envia dados de acesso caso conta tenha sido criada.
	 * 
	 * @param string $email
	 * @param integer $nomeProjetoCanvas
	 * @param string $senha
	 */
	private function enviarEmailNotificacao($email, $nomeProjetoCanvas, $senha)
	{
		Yii::$app->mailer->compose('projeto-compartilhado', [
			    'nomeProjetoCanvas' => $nomeProjetoCanvas,
			    'email' => $email,
			    'senha' => $senha,
			])
			->setFrom(Yii::$app->params['adminEmail'])
			->setTo($email)
			->setSubject(Yii::t('app', 'KZ-Canvas - um projeto foi compartilhado com voce'))
			->send();
	}
	
	/**
	 * Cria um Projeto Canvas compartilhado no sistema.
	 * 
	 * @param integer $idProjetoCanvas
	 * @param integer $idUsuario
	 * @throws HttpException
	 * @return \app\modules\v1\models\ProjetoCanvasCompartilhado
	 */
	private function criarProjetoCanvasCompartilhado($idProjetoCanvas, $idUsuario)
	{
		ProjetoCanvasCompartilhado::deleteAll(['id_projeto_canvas' => $idProjetoCanvas, 'id_usuario' => $idUsuario]);
		
		$projetoCanvasCompartilhado = new ProjetoCanvasCompartilhado();
		$projetoCanvasCompartilhado->id_projeto_canvas = $idProjetoCanvas;
		$projetoCanvasCompartilhado->id_usuario = $idUsuario;
		if(!$projetoCanvasCompartilhado->save()) {
			throw new HttpException(400, Yii::t('projeto_canvas_compartilhado', 'Error sharing project'), 400);
		}
		return $projetoCanvasCompartilhado;
	}
	
	/**
	 * Cria um usuario caso a conta seja inextente no sistema.
	 * 
	 * @param string $email
	 * @param string $lingua
	 * @param string $senha
	 * @throws HttpException
	 * @return \app\modules\v1\models\Usuario
	 */
	private function criarUsuario($email, $lingua, $senha)
	{
		$usuario = new Usuario();
		$usuario->email = $email;
		$usuario->senha = $senha;
		$usuario->lingua = $lingua;
		$usuario->ativo = Usuario::ATIVO;
		if(!$usuario->save()) {
			return ['aqui' => VarDumper::dumpAsString($usuario->getErrors())];
			throw new HttpException(400, Yii::t('projeto_canvas_compartilhado', 'Error sharing project'), 400);
		}
		return $usuario;
	}
}