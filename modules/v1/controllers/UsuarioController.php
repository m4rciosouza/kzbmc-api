<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use yii\web\UnauthorizedHttpException;

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
		unset($actions['index'], $actions['view'], $actions['update'], $actions['delete']);
		return $actions;
	}
	
	/**
	 * Método POST de autenticação de usuário.
	 * Passar usuário e senha como parâmetros.
	 * 
	 * @throws UnauthorizedHttpException
	 * @return json string
	 */
	public function actionAutenticar()
	{
		$model = new Usuario();
		if($model->load(\Yii::$app->request->post())) {
			$usuario = Usuario::findOne(['email' => $model->email]);
			if($usuario && $usuario->senha == md5($model->senha)) {
				return ['token' => $usuario->generateJwtToken()];
			}
		}		
        throw new UnauthorizedHttpException('Bad credentials', 401);
	}
}