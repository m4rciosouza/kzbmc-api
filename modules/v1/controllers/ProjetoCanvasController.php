<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;

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
		return new ActiveDataProvider([
	           'query' => ProjetoCanvas::find()->where(['ativo' => 'S']),
	        ]);
	}
	
	public function actionBuscarPorIdUsuario($id)
	{
        return ProjetoCanvas::findAll(['id_usuario' => (int) $id]);
	}
}