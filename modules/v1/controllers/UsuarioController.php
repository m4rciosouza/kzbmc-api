<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;
use yii\web\Request;
use yii\web\BadRequestHttpException;

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
	 * Método POST de autenticação de usuário.
	 * Passar usuário e senha como parâmetros.
	 * 
	 * @throws UnauthorizedHttpException
	 * @return json string
	 * @deprecated MOVIDO PARA TOKENCTRL
	 */
	public function actionAutenticar()
	{
		$model = new Usuario();
		if($model->load(Yii::$app->request->post())) {
			$usuario = Usuario::findOne(['email' => $model->email]);
			if($usuario && $usuario->senha == md5($model->senha) && 
				$usuario->ativo == Usuario::ATIVO) {
				return ['token' => $usuario->generateJwtToken()];
			}
		}		
        throw new UnauthorizedHttpException('Bad credentials', 401);
	}
	
	public function actionEsqueciSenha()
	{
		$email = Yii::$app->request->getBodyParam('email');
		$usuario = Usuario::findOne(['email' => $email]);
		if(!$usuario) {
			throw new BadRequestHttpException('Invalid email', 400);
		}
		
		$usuario->ativo = Usuario::INATIVO;
		$usuario->save();
		
		Yii::$app->mailer->compose()
			->setFrom(Yii::$app->params['adminEmail'])
			->setTo($email)
			->setSubject('Recuperar Senha')
			->setHtmlBody('<b>Clique no link <a href="#">AQUI</a> para definir uma nova senha.</b>')
			->send();
		
		Yii::$app->end();
	}
}