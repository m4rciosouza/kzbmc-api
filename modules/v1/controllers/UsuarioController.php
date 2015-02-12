<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;

class UsuarioController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\Usuario';
	
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
		unset($actions['index'], $actions['view'], $actions['delete']);
		return $actions;
	}
	
	/**
	 * Método de autenticação de usuário.
	 * Passar usuário e senha como parâmetros.
	 * 
	 * @throws UnauthorizedHttpException
	 * @return json string
	 */
	public function actionAutenticar()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		$email = Yii::$app->request->getBodyParam('email');
		$senha = Yii::$app->request->getBodyParam('senha');
        $usuario = Usuario::findOne(['email' => $email]);
        if($usuario && $usuario->senha == md5($senha) &&
        		$usuario->ativo == Usuario::ATIVO) {
        	$usuario->token = $usuario->generateJwtToken();
        	if(!$usuario->save()) {
        		throw new HttpException(500, 'Internal error');
        	}
        	return ['token' => $usuario->token];
        }
        throw new UnauthorizedHttpException('Bad credentials', 401);
	}
	
	public function actionEsqueciSenha()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		$email = Yii::$app->request->getBodyParam('email');
		$usuario = Usuario::findOne(['email' => $email]);
		if(!$usuario) {
			throw new BadRequestHttpException('Invalid email', 400);
		}
		
		$token = md5($usuario->id . $usuario->email);
		$usuario->senha = $token;
		$usuario->ativo = Usuario::INATIVO;
		$usuario->save();

		$url = "http://localhost:9000/#/nova-senha/usuario/{$usuario->email}/token/$token";
		
		Yii::$app->mailer->compose()
			->setFrom(Yii::$app->params['adminEmail'])
			->setTo($email)
			->setSubject('Recuperar Senha')
			->setHtmlBody('<b>Clique no link <a href="' . $url . '">AQUI</a> para definir uma nova senha.</b>')
			->send();
		
		Yii::$app->end();
	}
	
	public function actionNovaSenha()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		$email = Yii::$app->request->getBodyParam('email');
		$senha = Yii::$app->request->getBodyParam('senha');
		$token = Yii::$app->request->getBodyParam('token');
		$usuario = Usuario::findOne(['email' => $email]);
		if(!$usuario || !$senha || !$token) {
			throw new BadRequestHttpException('Invalid request params', 400);
		}
		
		if($usuario->senha != $token) {
			throw new BadRequestHttpException('Invalid token', 400);
		}
		
		$usuario->senha = $senha;
		$usuario->ativo = Usuario::ATIVO;
		if(!$usuario->save()) {
			throw new HttpException(500, 'Internal error');
		}
	
		Yii::$app->end();
	}
	
	public function actionTrocarSenha()
	{
		if(Yii::$app->request->getIsOptions()) {
			return true;
		}
		$email = Yii::$app->request->getBodyParam('email');
		$senhaAtual = Yii::$app->request->getBodyParam('senhaAtual');
		$novaSenha = Yii::$app->request->getBodyParam('novaSenha');
		$usuario = Usuario::findOne(['email' => $email]);
		if(!$usuario || !$senhaAtual || !$novaSenha) {
			throw new BadRequestHttpException('Invalid request params', 400);
		}
	
		if($usuario->senha != md5($senhaAtual)) {
			throw new BadRequestHttpException('Invalid current password', 400);
		}
	
		$usuario->senha = $novaSenha;
		if(!$usuario->save()) {
			throw new HttpException(500, 'Internal error');
		}
	
		Yii::$app->end();
	}
}