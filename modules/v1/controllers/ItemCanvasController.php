<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ItemCanvas;

class ItemCanvasController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ItemCanvas';
	
	public $serializer = [
			'class' => 'yii\rest\Serializer',
			'collectionEnvelope' => 'items',
	];
	
	public function actionBuscarPorIdProjetoCanvas($id)
	{
		return ItemCanvas::findAll(['id_projeto_canvas' => (int) $id]);
	}
}