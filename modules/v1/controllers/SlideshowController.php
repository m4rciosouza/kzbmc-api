<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;
use yii\data\ActiveDataProvider;
use app\modules\v1\models\Usuario;
use Yii;
use yii\web\Response;
use yii\web\ForbiddenHttpException;

class SlideshowController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvas';
	
	public $layout = 'plain';
	
	public function init()
	{
		parent::init();
		Yii::$app->response->format = Response::FORMAT_HTML;
	}
	
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
		$id = Yii::$app->request->getQueryParam('id');
		$projetoCanvas = ProjetoCanvas::findOne($id);
		
		if(!$projetoCanvas) {
			throw new ForbiddenHttpException('Not allowed', 403);
		}
		
		return $this->render('index', ['projeto' => $projetoCanvas, 
						'itens' => $projetoCanvas->getItens()]);
	}
}