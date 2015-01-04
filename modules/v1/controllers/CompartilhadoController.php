<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;
use app\models\Usuario;
use app\modules\v1\models\ProjetoCanvasCompartilhado;

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
		$actions['index']['prepareDataProvider'] = [$this, 'prepareDataProviderIndex'];
		return $actions;
	}
	
	public function prepareDataProviderIndex()
	{
		$condition = [];
		$email = \Yii::$app->request->get('email', null);
		if($email !== null) {
			$usuario = Usuario::findOne(['email' => $email]);
			$condition['id_usuario'] = $usuario ? $usuario->id : -1;
		}
		return new ActiveDataProvider([
				'query' => ProjetoCanvasCompartilhado::find()->where($condition),
		]);
	}
	
	//TODO ao cadastrar verificar pelo email enviado se existe usuario, caso exista apenas utilizar o id e enviar email,
	// caso nao exista, criar usuario, gerar senha aleatoria e enviar email com instrucoes.
}