<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;
use app\modules\v1\models\ProjetoCanvas;

class ProjetoCanvasController extends ActiveController
{
	public $modelClass = 'app\modules\v1\models\ProjetoCanvas';
	
	public $serializer = [
			'class' => 'yii\rest\Serializer',
			'collectionEnvelope' => 'items',
	];
	
	public function actionBuscarPorIdUsuario($id)
	{
        return ProjetoCanvas::findAll(['id_usuario' => (int) $id]);
	}
}