<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;
use app\models\Usuario;
use yii\filters\auth\QueryParamAuth;

class ProjetoCanvasController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvas';
	
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
						'class' => QueryParamAuth::className(),
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
		$condition = ['ativo' => 'S'];
		$email = \Yii::$app->request->get('email', null);
		if($email !== null) {
			$usuario = Usuario::findOne(['email' => $email]);
			$condition['id_usuario'] = $usuario ? $usuario->id : -1;
		}
		return new ActiveDataProvider([
	           'query' => ProjetoCanvas::find()->where($condition),
	        ]);
	}
	
	public function actionBuscarPorIdUsuario($id)
	{
        return ProjetoCanvas::findAll(['id_usuario' => (int) $id]);
	}
}