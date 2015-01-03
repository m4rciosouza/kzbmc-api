<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

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
	
	//TODO listar projetos canvas por usuario, fazendo join com a tabela de projeto_canvas por id de projeto.
	
	//TODO ao cadastrar verificar pelo email enviado se existe usuario, caso exista apenas utilizar o id e enviar email,
	// caso nao exista, criar usuario, gerar senha aleatoria e enviar email com instrucoes.
}