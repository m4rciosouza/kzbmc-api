<?php

namespace app\modules\v1;

use Yii;
use yii\web\Response;

class ProjetoCanvas extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\v1\controllers';

    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
		// define o formato da resposta dos dados
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->charset = 'UTF-8';
    }
}