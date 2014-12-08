<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;
use yii\web\Request;
use yii\web\BadRequestHttpException;

class TokenController extends ActiveController
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
		unset($actions['view'], $actions['delete']);
		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProviderIndex'];
		return $actions;
	}
	
	/**
	 * Método GET de autenticação de usuário.
	 * Passar usuário e senha como parâmetros.
	 *
	 * @throws UnauthorizedHttpException
	 * @return json string
	 */
	public function prepareDataProviderIndex()
	{
		$email = Yii::$app->request->get('email');
		$senha = Yii::$app->request->get('senha');
		$usuario = Usuario::findOne(['email' => $email]);
		if($usuario && $usuario->senha == md5($senha) && 
			$usuario->ativo == Usuario::ATIVO) {
			return ['token' => $usuario->generateJwtToken()];
		}		
        throw new UnauthorizedHttpException('Bad credentials', 401);
	}
}