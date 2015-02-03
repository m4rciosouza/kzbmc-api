<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use Yii;
use yii\web\Response;
use yii\web\ForbiddenHttpException;
use JWT;
use yii\web\UnauthorizedHttpException;

class SlideshowController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvas';
	
	public $layout = 'plain';
	
	public function init()
	{
		parent::init();
		Yii::$app->response->format = Response::FORMAT_HTML;
		Yii::$app->errorHandler->errorAction = 'v1/default/error';
	}
	
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
		unset($actions['create'], $actions['update'], $actions['view'], $actions['delete']);
		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProviderIndex'];
		return $actions;
	}
	
	public function prepareDataProviderIndex()
	{
		$this->validarSessao();
		$id = Yii::$app->request->getQueryParam('id');
		$projetoCanvas = ProjetoCanvas::findOne($id);
		
		if(!$projetoCanvas) {
			throw new ForbiddenHttpException('Not allowed', 403);
		}
		
		return $this->render('index', ['projeto' => $projetoCanvas, 
						'itens' => $projetoCanvas->getItens()]);
	}
	
	private function validarSessao()
	{
		$email = Usuario::getRequestedEmail();
		$usuario = Usuario::findOne(['email' => $email, 'ativo' => Usuario::ATIVO]);
		if(!$usuario) {
			throw new UnauthorizedHttpException('Unauthorized', 401);
		}
		try {
			$tokenData = JWT::decode($usuario->token, Yii::$app->params['jwt_key']);
		}
		catch(\Exception $e) {
			throw new UnauthorizedHttpException('Unauthorized', 401);
		}
	}
}